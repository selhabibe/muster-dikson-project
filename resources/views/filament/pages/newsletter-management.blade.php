<x-filament-panels::page>
    <x-filament-panels::form wire:submit="sendNewsletter">
        {{ $this->form }}

        <div class="mt-6">
            <x-filament::button type="submit" size="lg">
                Send Newsletter
            </x-filament::button>
        </div>
    </x-filament-panels::form>

    <x-filament::section class="mt-6">
        <div class="space-y-4">
            <h2 class="text-xl font-bold tracking-tight">Newsletter Statistics</h2>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Subscribers</dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ \App\Models\NewsletterSubscriber::count() }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Active Subscribers</dt>
                            <dd class="mt-1 text-3xl font-semibold text-green-600">{{ \App\Models\NewsletterSubscriber::where('is_active', true)->count() }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Inactive Subscribers</dt>
                            <dd class="mt-1 text-3xl font-semibold text-red-600">{{ \App\Models\NewsletterSubscriber::where('is_active', false)->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-900">Recent Subscribers</h3>
                <div class="mt-2 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subscribed At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach(\App\Models\NewsletterSubscriber::orderBy('created_at', 'desc')->take(5)->get() as $subscriber)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $subscriber->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($subscriber->is_active)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subscriber->subscribed_at->format('M d, Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ \App\Filament\Resources\NewsletterSubscriberResource::getUrl('index') }}" class="text-indigo-600 hover:text-indigo-900">View all subscribers</a>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-panels::page>
