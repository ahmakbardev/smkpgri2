@extends('layouts.layout')

@section('content')
    <div class="container mx-auto py-8 grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Left Sidebar -->
        <aside class="md:col-span-3 hidden md:block sticky top-28 h-fit">
            <!-- Section for Article Author -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <div class="flex items-center space-x-4">
                    <img src="https://i.pravatar.cc/50?img=1" alt="Author Avatar" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-semibold text-lg">Collaborator</h3>
                        <p class="text-sm text-gray-600">By Risca Fadillah</p>
                    </div>
                </div>
            </div>

            <!-- Latest Update Section -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="font-semibold text-lg mb-4">Latest Update</h2>
                <ul>
                    <li class="mb-3"><a href="#" class="text-blue-500 hover:underline">Understanding Effective
                            Sentences</a></li>
                    <li class="mb-3"><a href="#" class="text-blue-500 hover:underline">How to Write a Conclusion</a>
                    </li>
                    <li class="mb-3"><a href="#" class="text-blue-500 hover:underline">What is Proofreading?</a>
                    </li>
                </ul>
            </div>
        </aside>


        <!-- Main Content -->
        <main class="md:col-span-6 bg-white p-8 rounded-lg shadow-md">
            <nav class="mb-4 text-sm text-gray-600">
                <a href="#" class="hover:underline">Home</a> &gt;
                <a href="#" class="hover:underline">References</a> &gt;
                <span>Understanding Effective Sentences</span>
            </nav>

            <article>
                <h1 class="text-3xl font-bold mb-4">Understanding Effective Sentences: Characteristics and Examples</h1>
                <p class="text-sm text-gray-500 mb-4">Last updated: Sep 18, 2024</p>

                <div class="bg-teal-100 p-4 rounded-md mb-6">
                    <p class="text-teal-800 font-semibold">Disclaimer: We regularly update our References with new knowledge
                        based on in-depth research on some reliable sources and authorities.</p>
                </div>

                <p class="mb-4">If you are a writer, then the ability to create effective sentences is a must-have skill.
                    Effective sentences make it easier for readers to understand everything you want to convey.</p>

                <p class="mb-4">Let's take a closer look at what is an effective sentence, its purpose, characteristics,
                    and examples in the following article!</p>

                <h2 class="text-2xl font-semibold mt-8 mb-4">What Is an Effective Sentence?</h2>
                <p class="mb-4">Effective sentences are sentences that are well-written according to the rules so that the
                    reader can easily understand the message, idea, or information contained.</p>

                <h2 class="text-2xl font-semibold mt-8 mb-4">Examples of Effective Sentences</h2>
                <p class="mb-4">Here are a few examples of how to craft effective sentences...</p>
            </article>
        </main>

        <!-- Right Sidebar -->
        <aside class="md:col-span-3 hidden md:block sticky top-28 h-fit">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="font-semibold text-lg mb-4">Share Now</h2>
                <div class="flex space-x-3">
                    <a href="#" class="text-blue-500 hover:underline">LinkedIn</a>
                    <a href="#" class="text-blue-500 hover:underline">Twitter</a>
                    <a href="#" class="text-blue-500 hover:underline">Facebook</a>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md mt-6">
                <h2 class="font-semibold text-lg mb-4">Sponsored Ad</h2>
                <img src="https://via.placeholder.com/150" alt="Ad Image" class="rounded-md">
            </div>
        </aside>
    </div>
@endsection
