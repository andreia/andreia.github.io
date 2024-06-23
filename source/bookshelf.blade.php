---
title: Bookshelf
description: Books worth reading about web development, tech, and misc content
---
@extends('_layouts.master')

@section('body')
    <h1>Bookshelf</h1>

    <hr class="border-b my-6">

    <p>Books worth reading. This is a WIP page.</p>
    <span class="text-gray-500 text-sm">(click on book to see it on Amazon)</span>

    <h2 class="pb-2">Web Development and technology</h2>

    <div class="flex flex-wrap gap-4"> 

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3VEvYnc" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/refactoring.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Refactoring</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Improving the Design of <br />Existing Code</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3XzteKq" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/algorithms_to_live_by.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Algorithms to Live By</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">The Computer Science of <br />Human Decisions</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3KQoWXE" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/consuming_apis_in_laravel.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Consuming APIs in Laravel</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Build Robust and Powerful<br />API Integrations</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/4bg4wlH" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/clean_code.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Clean Code</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">A Handbook of Agile <br />Software Craftsmanship</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3zigE8r" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/hackers_and_painters.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="Hackers & Painters: Big Ideas from the Computer Age" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Hackers & Painters</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Big Ideas from the Computer Age</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3RJu3wz" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/dreaming_in_code.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Dreaming in Code</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Two Dozen Programmers, Three Years, 4,732 Bugs<br />and One Quest for Transcendent Software</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/4be9waw" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/dont_make_me_think.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Don't Make Me Think, Revisited</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">A Common Sense Approach<br />to Web Usability</h1>
                    </div>
                </a>
            </div>
        </div>

        

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/45vV502" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/battle-ready-laravel.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Battle Ready Laravel</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">A guide to auditing, testing, fixing <br />and improving your Laravel apps</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3RBysla" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/driving_technical_change.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Driving Technical Change</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Why People on Your Team Don't Act on  <br />Good Ideas, and How to Convince Them They Should</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3L28dR3" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/desing_patterns.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Design Patterns</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Elements of Reusable Object-Oriented Software</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3zg43CN" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/facts_and_fallacies_of_software_engineering.jpeg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Facts and Fallacies of Software Engineering</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl"></h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3XCx8T8" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/soft_skills.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="Soft Skills: The Software Developer's Life Manual" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Soft Skills</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">The Software Developer's Life Manual</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/4casL5T" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/code_complete.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Code Complete</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">A Practical Handbook of<br />Software Construction</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <h2 class="pb-2">Misc</h2>

    <div class="flex flex-wrap gap-4"> 
        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3VRfhqg" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/shape_of_ideas.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">The Shape of Ideas</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">An Illustrated Exploration<br />of Creativity</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3KWggit" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/remote.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Remote</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Office Not Required </h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/4b3W48Y" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/o_metodo_bullet_journal.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">O método Bullet Journal</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">Registre o passado, organize o<br /> presente, planeje o futuro</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3xyOHIX" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/quiet.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Quiet</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">The Power of Introverts in a World<br /> That Can't Stop Talking</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/4eDw07u" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/ikigai.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="Ikigai: The Japanese Secret to a Long and Happy Life" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Ikigai</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl">The Japanese Secret to a Long and Happy Life</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="pb-4">
            <div class="group relative m-0 flex h-96 w-full rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                <a href="https://amzn.to/3xCn29W" rel="noopener noreferrer" target="_blank">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="/assets/img/books/rework.jpg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="Rework" />
                    </div>
                    <div class="absolute bottom-0 z-20 m-0 pb-4 ps-4" style="visibility: hidden">
                        <h1 class="font-serif text-xl pb-2 font-bold text-white shadow-xl">Rework</h1>
                        <h1 class="text-xs font-light pb-2 text-gray-200 shadow-xl"></h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
@stop
