@extends('layouts.app')

@php
    $slot = $slot ?? '';
    $pricingPlans = $pricingPlans ?? [
        [
            'name' => 'Basic',
            'price' => '$0',
            'period' => 'month',
            'description' => 'Access to basic features and market data.',
            'features' => ['Live market data', 'Basic portfolio tracking'],
            'notFeatures' => ['Advanced analytics', 'One-on-one coaching', 'Premium news'],
            'buttonText' => 'Get Started',
            'buttonVariant' => 'default',
            'disabled' => false,
            'popular' => false,
        ],
        [
            'name' => 'Pro',
            'price' => '$19',
            'period' => 'month',
            'description' => 'Unlock advanced analytics and premium features.',
            'features' => ['Live market data', 'Advanced analytics', 'Premium news'],
            'notFeatures' => ['One-on-one coaching'],
            'buttonText' => 'Upgrade',
            'buttonVariant' => 'default',
            'disabled' => false,
            'popular' => true,
        ],
        [
            'name' => 'Elite',
            'price' => '$49',
            'period' => 'month',
            'description' => 'All features plus personal coaching and priority support.',
            'features' => ['Live market data', 'Advanced analytics', 'Premium news', 'One-on-one coaching'],
            'notFeatures' => [],
            'buttonText' => 'Go Elite',
            'buttonVariant' => 'default',
            'disabled' => false,
            'popular' => false,
        ],
    ];
    $testimonials = $testimonials ?? [
        [
            'quote' => 'TradeX Premium gave me the confidence to make smarter investment decisions. Highly recommended!',
            'name' => 'Alice M.',
            'role' => 'Retail Investor',
            'location' => 'Harare',
        ],
        [
            'quote' => 'The analytics and one-on-one coaching are game changers for my portfolio.',
            'name' => 'Brian K.',
            'role' => 'Entrepreneur',
            'location' => 'Bulawayo',
        ],
        [
            'quote' => 'I love the premium news and insights. Worth every cent!',
            'name' => 'Chipo D.',
            'role' => 'Finance Student',
            'location' => 'Mutare',
        ],
    ];
    $featureComparisons = $featureComparisons ?? [
        [
            'name' => 'Live market data',
            'basic' => '✔️',
            'pro' => '✔️',
            'elite' => '✔️',
        ],
        [
            'name' => 'Advanced analytics',
            'basic' => '❌',
            'pro' => '✔️',
            'elite' => '✔️',
        ],
        [
            'name' => 'Premium news',
            'basic' => '❌',
            'pro' => '✔️',
            'elite' => '✔️',
        ],
        [
            'name' => 'One-on-one coaching',
            'basic' => '❌',
            'pro' => '❌',
            'elite' => '✔️',
        ],
        [
            'name' => 'Priority support',
            'basic' => '❌',
            'pro' => '❌',
            'elite' => '✔️',
        ],
    ];
    $frequentlyAskedQuestions = $frequentlyAskedQuestions ?? [
        [
            'question' => 'What is included in the Pro plan?',
            'answer' => 'The Pro plan includes advanced analytics, premium news, and all features from the Basic plan.',
        ],
        [
            'question' => 'Can I upgrade or downgrade my plan at any time?',
            'answer' => 'Yes, you can change your plan at any time from your account settings.',
        ],
        [
            'question' => 'Is there a free trial for premium features?',
            'answer' => 'Yes, we offer a 7-day free trial for new users to experience premium features.',
        ],
    ];
@endphp

@section('content')
<x-app-layout>
    <div class="py-6 md:pl-64">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-10">
                @yield('premium-content')
            </div>
        </div>
    </div>
</x-app-layout>
@endsection

@section('premium-content')
    <div class="text-center">
        <h2 class="text-4xl font-bold text-zimstock-blue">Premium Features</h2>
        <p class="text-xl text-muted-foreground mt-2">
            Unlock advanced tools and personalized advice to maximize your investment potential
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        @foreach($pricingPlans as $plan)
        <div class="card relative overflow-hidden {{ $plan['popular'] ? 'border-2 border-zimstock-green shadow-lg' : '' }}">
            @if($plan['popular'])
            <div class="absolute top-0 right-0">
                <span class="badge bg-zimstock-green rounded-bl-md rounded-tr-md rounded-tl-none rounded-br-none">Most Popular</span>
            </div>
            @endif
            <div class="card-header">
                <h3 class="text-2xl">{{ $plan['name'] }}</h3>
                <div class="mt-4">
                    <span class="text-4xl font-bold">{{ $plan['price'] }}</span>
                    @if(isset($plan['period']))
                    <span class="text-muted-foreground">/{{ $plan['period'] }}</span>
                    @endif
                </div>
                <p class="text-base mt-2">{{ $plan['description'] }}</p>
            </div>
            <div class="card-content space-y-4">
                <ul class="space-y-2">
                    @foreach($plan['features'] as $feature)
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-600 mr-2 mt-0.5"></i>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                    @foreach($plan['notFeatures'] as $feature)
                    <li class="flex items-start text-muted-foreground">
                        <i class="fas fa-times text-red-600 mr-2 mt-0.5"></i>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer">
                <button class="btn w-full {{ $plan['buttonVariant'] === 'default' ? 'bg-zimstock-green hover:bg-zimstock-green/90' : '' }}"
                    {{ $plan['disabled'] ? 'disabled' : '' }}>
                    {{ $plan['buttonText'] }}
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <div class="bg-gradient-to-r from-zimstock-blue to-zimstock-lightblue rounded-lg text-white p-8 my-12">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold mb-4">Unlock the Full Potential of Your Investments</h3>
            <p class="text-lg mb-6">
                Join thousands of investors who have enhanced their ZSE performance with our premium features.
                Get personalized recommendations, expert guidance, and exclusive market insights.
            </p>
            <button class="btn btn-lg bg-white text-zimstock-blue hover:bg-gray-100">
                Upgrade Now <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>

    <div>
        <h3 class="text-2xl font-bold text-center mb-8">What Our Premium Members Say</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="card bg-gray-50">
                <div class="card-content pt-6">
                    <div class="mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <span class="text-yellow-500 text-lg">★</span>
                        @endfor
                    </div>
                    <p class="italic">"{{ $testimonial['quote'] }}"</p>
                    <div class="mt-4">
                        <p class="font-medium">{{ $testimonial['name'] }}</p>
                        <p class="text-sm text-muted-foreground">{{ $testimonial['role'] }}, {{ $testimonial['location'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div>
        <h3 class="text-2xl font-bold text-center mb-8">Premium Features Comparison</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-4 text-left">Feature</th>
                        <th class="p-4 text-center">Basic</th>
                        <th class="p-4 text-center">Pro</th>
                        <th class="p-4 text-center">Elite</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($featureComparisons as $feature)
                    <tr class="border-t">
                        <td class="p-4">{{ $feature['name'] }}</td>
                        <td class="p-4 text-center">{{ $feature['basic'] }}</td>
                        <td class="p-4 text-center">{{ $feature['pro'] }}</td>
                        <td class="p-4 text-center">{{ $feature['elite'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-12">
        <h3 class="text-2xl font-bold text-center mb-8">Frequently Asked Questions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($frequentlyAskedQuestions as $faq)
            <div class="card">
                <div class="card-header">
                    <h4 class="text-lg font-bold">{{ $faq['question'] }}</h4>
                </div>
                <div class="card-content">
                    <p>{{ $faq['answer'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="card border-2 border-dashed border-zimstock-blue p-6 mt-12">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="flex-shrink-0">
                <div class="w-16 h-16 rounded-full bg-zimstock-blue/10 flex items-center justify-center">
                    <i class="fas fa-exclamation-circle h-8 w-8 text-zimstock-blue"></i>
                </div>
            </div>
            <div class="flex-grow">
                <h3 class="text-xl font-bold mb-2">Need Help Deciding?</h3>
                <p class="text-muted-foreground">
                    Our team is ready to help you choose the right plan for your investment needs. 
                    Get in touch for a free consultation to discuss which features would benefit you the most.
                </p>
            </div>
            <div class="flex-shrink-0">
                <button class="btn">Contact Us</button>
            </div>
        </div>
    </div>
@endsection