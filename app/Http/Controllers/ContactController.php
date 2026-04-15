<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        $a = rand(1, 10);
        $b = rand(1, 10);
        session(['captcha_answer' => $a + $b]);

        return view('public.contact', compact('a', 'b'));
    }

    /**
     * Store a new contact submission.
     */
    public function store(Request $request): RedirectResponse
    {
        // Rate limiting: max 5 submissions per hour per IP
        $key = 'contact-form:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            
            return redirect()->route('contact')
                ->with('error', "Too many submissions. Please try again in {$minutes} minute(s).");
        }

        // Honeypot check: if this field is filled, it's likely a bot
        if ($request->filled('website_url')) {
            // Silently reject but pretend success to confuse bots
            return redirect()->route('contact')
                ->with('success', 'Thank you for your message. We will get back to you soon!');
        }

        // Time-based validation: form must take at least 3 seconds to fill
        $formLoadedAt = $request->input('_form_token');
        if ($formLoadedAt) {
            $formLoadedTime = (int) base64_decode($formLoadedAt);
            $submissionTime = time();
            $timeTaken = $submissionTime - $formLoadedTime;

            if ($timeTaken < 3) {
                // Too fast, likely a bot - silently reject
                return redirect()->route('contact')
                    ->with('success', 'Thank you for your message. We will get back to you soon!');
            }
        }

        // CAPTCHA check
        $captchaAnswer = session('captcha_answer');
        if (!$captchaAnswer || (int) $request->input('captcha') !== (int) $captchaAnswer) {
            return redirect()->route('contact')
                ->withInput()
                ->withErrors(['captcha' => 'The answer to the math question is incorrect.']);
        }
        session()->forget('captcha_answer');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'organization' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Additional spam checks on content
        if ($this->isSpamContent($validated['message']) || $this->isSpamContent($validated['name'])) {
            return redirect()->route('contact')
                ->with('success', 'Thank you for your message. We will get back to you soon!');
        }

        Contact::create($validated);

        // Record the rate limit hit
        RateLimiter::hit($key, 3600); // 1 hour decay

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    /**
     * Check if content contains spam patterns.
     */
    private function isSpamContent(string $content): bool
    {
        $spamPatterns = [
            '/\[url=/i',
            '/\[link=/i',
            '/<a\s+href/i',
            '/viagra|cialis|casino|poker|lottery|winner|congratulations.*won/i',
            '/click here.*http/i',
            '/earn.*\$\d+.*day/i',
            '/make money fast/i',
            '/\b(SEO|backlink|link building)\b.*\b(service|offer|cheap)\b/i',
        ];

        foreach ($spamPatterns as $pattern) {
            if (preg_match($pattern, $content)) {
                return true;
            }
        }

        // Check for excessive URLs
        $urlCount = preg_match_all('/https?:\/\//i', $content);
        if ($urlCount > 3) {
            return true;
        }

        return false;
    }
}
