{{-- resources/views/one-on-one.blade.php --}}
<div class="space-y-6">
    <div>
        <h2 class="text-3xl font-bold text-zimstock-blue">One-on-One Consultation</h2>
        <p class="text-muted-foreground">Schedule a personalized session with our investment advisors</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">Book Your Session</h3>
                    <p class="card-description">
                        Get personalized investment advice tailored to your needs
                    </p>
                </div>
                <div class="card-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-medium mb-4">1. Choose a Date</h4>
                            <div class="rounded-md border">
                                <x-flatpickr wire:model.defer="selectedDate" :config="[
                                    'mode' => 'single',
                                    'minDate' => now()->toDateString(),
                                    'disable' => [
                                        function (Date $date) {
                                            return $date->getDay() === 0 || $date->getDay() === 6;
                                        },
                                    ],
                                ]" />
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium mb-4">2. Select Time Slot</h4>
                            @if ($selectedDate)
                                <div class="grid grid-cols-2 gap-3">
                                    @foreach ($timeSlots as $time)
                                        <button wire:click="selectTime('{{ $time }}')" type="button" class="inline-flex items-start justify-start rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 h-4 w-4">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.99l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $time }}
                                        </button>
                                    @endforeach
                                </div>
                            @else
                                <div class="flex items-center justify-center h-[280px] border rounded-md border-dashed">
                                    <p class="text-muted-foreground">Please select a date first</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-4">3. Consultation Type</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-start space-x-2">
                                <input wire:model="consultationType" type="radio" value="investment" id="investment" class="shrink-0 mt-0.5 border rounded-full text-zimstock-blue focus:ring-zimstock-blue disabled:opacity-50" />
                                <div class="grid gap-1.5">
                                    <label for="investment" class="font-medium">Investment Strategy</label>
                                    <p class="text-sm text-muted-foreground">
                                        Get advice on building a balanced portfolio for long-term growth
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <input wire:model="consultationType" type="radio" value="stock-picks" id="stock-picks" class="shrink-0 mt-0.5 border rounded-full text-zimstock-blue focus:ring-zimstock-blue disabled:opacity-50" />
                                <div class="grid gap-1.5">
                                    <label for="stock-picks" class="font-medium">Stock Picks Analysis</label>
                                    <p class="text-sm text-muted-foreground">
                                        Detailed analysis of specific stocks you're interested in
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <input wire:model="consultationType" type="radio" value="portfolio-review" id="portfolio-review" class="shrink-0 mt-0.5 border rounded-full text-zimstock-blue focus:ring-zimstock-blue disabled:opacity-50" />
                                <div class="grid gap-1.5">
                                    <label for="portfolio-review" class="font-medium">Portfolio Review</label>
                                    <p class="text-sm text-muted-foreground">
                                        Get feedback on your current investments and recommendations
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-lg font-medium mb-4">4. Select Advisor</h4>
                            <div class="relative">
                                <select wire:model.defer="selectedAdvisor" class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                    <option value="">Choose an advisor</option>
                                    <option value="auto">Any Available Advisor</option>
                                    <option value="tatenda">Tatenda Moyo</option>
                                    <option value="nyasha">Nyasha Shava</option>
                                    <option value="chiedza">Chiedza Mukandi</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium mb-4">5. Consultation Method</h4>
                            <div class="relative">
                                <select wire:model.defer="consultationMethod" class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                    <option value="">Choose consultation method</option>
                                    <option value="video">Video Call</option>
                                    <option value="phone">Phone Call</option>
                                    <option value="in-person">In-Person Meeting</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-4">6. Additional Information</h4>
                        <textarea wire:model.defer="additionalNotes" placeholder="Please share any specific questions or topics you'd like to discuss during the consultation..." class="min-h-[120px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"></textarea>
                    </div>
                </div>
                <div class="card-footer flex flex-col md:flex-row space-y-4 md:space-y-0 md:justify-between border-t bg-gray-50 p-6">
                    <div class="text-sm text-muted-foreground">
                        <p>Session Duration: 45 minutes</p>
                        <p>Fee: $50 (Premium members: Free)</p>
                    </div>
                    <x-dialog>
                        <x-slot name="trigger">
                            <button type="button" class="inline-flex items-center justify-center rounded-md bg-zimstock-green px-4 py-2 text-sm font-medium text-white hover:bg-zimstock-green/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                Continue to Booking
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="ml-2 h-4 w-4">
                                    <path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h13.19l-5.47-5.47a.75.75 0 011.06-1.06l6.75 6.75a.75.75 0 010 1.06l-6.75 6.75a.75.75 0 01-1.06-1.06l5.47-5.47H4.5a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="sm:max-w-[500px]">
                                <div class="dialog-header">
                                    <h3 class="dialog-title">Complete Your Booking</h3>
                                    <p class="dialog-description">
                                        Please fill in your contact information to confirm your appointment.
                                    </p>
                                </div>
                                <div class="grid gap-4 py-4">
                                    <div class="grid grid-cols-4 items-center gap-4">
                                        <label for="name" class="text-right">Name</label>
                                        <input type="text" id="name" wire:model.defer="contactName" class="col-span-3 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" />
                                    </div>
                                    <div class="grid grid-cols-4 items-center gap-4">
                                        <label for="email" class="text-right">Email</label>
                                        <input type="email" id="email" wire:model.defer="contactEmail" class="col-span-3 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" />
                                    </div>
                                    <div class="grid grid-cols-4 items-center gap-4">
                                        <label for="phone" class="text-right">Phone</label>
                                        <input type="tel" id="phone" wire:model.defer="contactPhone" class="col-span-3 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" />
                                    </div>
                                </div>
                                <div class="dialog-footer">
                                    @if ($bookingComplete)
                                        <button type="button" class="inline-flex items-center justify-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" disabled>
                                            Booking Confirmed!
                                        </button>
                                    @else
                                        <button wire:click="handleBookAppointment" type="button" class="inline-flex items-center justify-center rounded-md bg-zimstock-blue px-4 py-2 text-sm font-medium text-white hover:bg-zimstock-blue/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                            Confirm Booking
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </x-slot>
                    </x-dialog>
                </div>
            </div>
        </div>

        <div>
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">Our Advisory Team</h3>
                    <p class="card-description">Meet our experienced investment professionals</p>
                </div>
                <div class="card-content space-y-6">
                    @foreach ($advisors as $advisor)
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{ $advisor['image'] }}" alt="{{ $advisor['name'] }}" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium">{{ $advisor['name'] }}</h4>
                                    @if ($advisor['available'])
                                        <span class="inline-flex items-center rounded-full border border-green-600 px-2.5 py-0.5 text-xs font-semibold text-green-600">Available</span>
                                    @endif
                                </div>
                                <p class="text-sm text-muted-foreground">{{ $advisor['role'] }}</p>
                                <p class="text-sm mt-1"><span class="font-medium">Experience:</span> {{ $advisor['experience'] }}</p>
                                <p class="text-sm"><span class="font-medium">Specialty:</span> {{ $advisor['specialty'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-gray-50 border-t flex flex-col items-start p-6">
                    <h4 class="font-medium mb-2">Why Book a One-on-One Session?</h4>
                    <ul class="list-disc pl-5 text-sm text-muted-foreground space-y-1">
                        <li>Personalized investment advice specific to your goals</li>
                        <li>Professional analysis of your current portfolio</li>
                        <li>Guidance on ZSE stock selection based on your risk profile</li>
                        <li>Strategy development for long-term wealth building</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Frequently Asked Questions</h3>
        </div>
        <div class="card-content grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium mb-2">What should I prepare for my consultation?</h4>
                <p class="text-muted-foreground">
                    It's helpful to have your current investment portfolio details, financial goals,
                    and specific questions ready for your advisor. This ensures a productive session.
                </p>
            </div>
            <div>
                <h4 class="font-medium mb-2">How long is each consultation session?</h4>
                <p class="text-muted-foreground">
                    Each session lasts 45 minutes. If you need more time, you can book a follow-up session
                    with the same advisor.
                </p>
            </div>
            <div>
                <h4 class="font-medium mb-2">Can I change my appointment time?</h4>
                <p class="text-muted-foreground">
                    Yes, you can reschedule your appointment up to 24 hours before your scheduled time
                    without any penalty.
                </p>
            </div>
            <div>
                <h4 class="font-medium mb-2">Are the consultations confidential?</h4>
                <p class="text-muted-foreground">
                    Absolutely. All discussions and information shared during your consultation