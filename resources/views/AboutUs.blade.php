@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div >
<section class="bg-gray-600">
    <div class="container px-6 py-10 mx-auto">
        <div class="xl:flex xl:items-center xL:-mx-4">
            <div class="xl:w-1/2 xl:mx-4  text-white">
                <h1 class="text-2xl font-semibold capitalize lg:text-3xl ">Our Team</h1>

                <p class="max-w-2xl mt-4 text-gray-300 ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error alias, adipisci rem similique, at omnis eligendi optio eos harum.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2 text-white">
                <div>
                    <img class="object-cover rounded-xl aspect-square" src="{{asset('img/woman_training.png')}}" alt="">

                    <h1 class="mt-4 text-2xl font-semibold  capitalize ">John Doe</h1>

                    <p class="mt-2 text-gray-300 capitalize ">Full stack developer</p>
                </div>

                <div>
                    <img class="object-cover rounded-xl aspect-square" src="{{asset('img/dumbells.png')}}" alt="">

                    <h1 class="mt-4 text-2xl font-semibold  capitalize ">Mia</h1>

                    <p class="mt-2 text-gray-300 capitalize ">Graphic Designer</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray-600 mt-1">
    <div class="container px-6 py-12 mx-auto text-white">
        <h1 class="text-2xl font-semibold  lg:text-3xl ">Frequently asked questions.</h1>

        <div class="grid grid-cols-1 gap-8 mt-8 lg:mt-16 md:grid-cols-2 xl:grid-cols-3">
            <div>
                <div class="inline-block p-3 text-white bg-amber-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-semibold  ">What can i expect at my first consultation?</h1>

                    <p class="mt-2 text-sm text-gray-300 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident placeat, consequatur eveniet veritatis quos dignissimos beatae dolores exercitationem laboriosam officia magnam atque blanditiis illum doloremque magni ex corrupti tempora quis.
                    </p>
                </div>
            </div>

            <div>
                <div class="inline-block p-3 text-white bg-amber-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-semibold  ">What are your opening house?</h1>

                    <p class="mt-2 text-sm text-gray-300 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident placeat, consequatur eveniet veritatis quos dignissimos beatae dolores exercitationem laboriosam officia magnam atque blanditiis illum doloremque magni ex corrupti tempora quis.
                    </p>
                </div>
            </div>

            <div>
                <div class="inline-block p-3 text-white bg-amber-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-semibold  ">Do i need a referral?</h1>

                    <p class="mt-2 text-sm text-gray-300 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident placeat, consequatur eveniet veritatis quos dignissimos beatae dolores exercitationem laboriosam officia magnam atque blanditiis illum doloremque magni ex corrupti tempora quis.
                    </p>
                </div>
            </div>

            <div>
                <div class="inline-block p-3 text-white bg-amber-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-semibold  ">Is the cost of the appoinment covered by private health insurance?</h1>

                    <p class="mt-2 text-sm text-gray-300 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident placeat, consequatur eveniet veritatis quos dignissimos beatae dolores exercitationem laboriosam officia magnam atque blanditiis illum doloremque magni ex corrupti tempora quis.
                    </p>
                </div>
            </div>

            <div>
                <div class="inline-block p-3 text-white bg-amber-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-semibold  ">What is your cancellation policy?</h1>

                    <p class="mt-2 text-sm text-gray-300 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident placeat, consequatur eveniet veritatis quos dignissimos beatae dolores exercitationem laboriosam officia magnam atque blanditiis illum doloremque magni ex corrupti tempora quis.
                    </p>
                </div>
            </div>

            <div>
                <div class="inline-block p-3 text-white bg-amber-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-semibold  ">What are the parking and public transport options?</h1>

                    <p class="mt-2 text-sm text-gray-300 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident placeat, consequatur eveniet veritatis quos dignissimos beatae dolores exercitationem laboriosam officia magnam atque blanditiis illum doloremque magni ex corrupti tempora quis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@include('layouts.footer')
@endsection