@extends('shared.layout')
@section('body')
    <div class="min-w-0 max-w-4xl flex-auto px-4 pt-16 lg:max-w-none lg:pl-8 lg:pr-0 xl:pl-16">
        <div class="max-w-3xl">
            <h1 class="font-display text-3xl tracking-tight text-slate-900 font-bold">Contact us</h1>
            <p class="text-lg text-slate-600 mt-9">
                Reach out to us about any questions you might have or contributions you need to make.
            </p>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:col-span-2 lg:gap-8 mt-12">
                <div class="rounded-2xl bg-slate-50 p-10">
                    <h3 class="text-base font-bold font-display text-slate-900">Support Team</h3>
                    <dl class="mt-3 space-y-1 text-sm leading-6 text-slate-600">
                        <div>
                            <dt class="sr-only">Email</dt>
                            <dd><a class="font-bold text-sky-500 hover:underline" href="mailto:tech_support@nira.org.ng">tech_support@nira.org.ng</a></dd>
                        </div>
                        <div class="mt-1">
                            <dt class="sr-only">Phone number</dt>
                            <dd><a href="tel:+1555000000" class="hover:underline"> +2348172004276</a></dd>
                            <address class="mt-3 space-y-1 text-sm not-italic leading-6 text-slate-600">
                            <p> 8 Funsho Wiliams Avenue, Iponri Surulere, Lagos, Nigeria.</p>
                            </address>
                        </div>
                    </dl>
                </div>
                <div class="rounded-2xl bg-slate-50 p-10">
                    <h3 class="text-base font-bold font-display text-slate-900">Admin Team</h3>
                    <dl class="mt-3 space-y-1 text-sm leading-6 text-slate-600">
                        <div>
                            <dt class="sr-only">Email</dt>
                            <dd><a class="font-bold text-sky-500 hover:underline" href="mailto:admin@nira.org.ng">admin@nira.org.ng</a></dd>
                        </div>
                        <div class="mt-1">
                            <dt class="sr-only">Phone number</dt>
                            <dd><a href="tel:+1555000000" class="hover:underline">  +2348172004272, +2348172004270</a></dd>
                            <address class="mt-3 space-y-1 text-sm not-italic leading-6 text-slate-600">
                                <p> 8 Funsho Wiliams Avenue, Iponri Surulere, Lagos, Nigeria.</p>
                            </address>
                        </div>
                    </dl>
                </div>
            </div>

 {{--           <h2 class="text-2xl font-bold font-display text-slate-900 mt-16">Contact form</h2>
            <form action="{{route('send_contact')}}" method="POST" class="mt-9">
                @csrf
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                    <div class="sm:col-span-2">
                        <label for="company" class="block text-sm font-semibold leading-6 text-slate-900">Company</label>
                        <div class="mt-2.5">
                            <input type="text" name="company" id="company" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-slate-300 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-semibold leading-6 text-slate-900">Email</label>
                        <div class="mt-2.5">
                            <input type="email" name="mail" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-slate-300 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="subject" class="block text-sm font-semibold leading-6 text-slate-900">Subject</label>
                        <div class="mt-2.5">
                            <input type="text" name="subject"  class="block w-full rounded-md border-0 px-3.5 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-slate-300 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone-number" class="block text-sm font-semibold leading-6 text-slate-900">Phone number</label>
                        <div class="relative mt-2.5">
                            <input type="tel" name="phone" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-slate-300 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-semibold leading-6 text-slate-900">Message</label>
                        <div class="mt-2.5">
                            <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-slate-300 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit" class="block w-56 rounded-md bg-sky-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-sky-600">Submit</button>
                </div>
            </form>
--}}

        </div>
    </div>
@endsection
