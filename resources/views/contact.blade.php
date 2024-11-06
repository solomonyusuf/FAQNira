@extends('shared.layout')

@section('body')
    <div class="container mx-auto min-w-0 max-w-4xl flex-auto px-4 pt-16 lg:max-w-none lg:pl-8 lg:pr-0 xl:pl-16">
        <div class="max-w-3xl">
            <h1 class="font-display text-3xl tracking-tight text-slate-900 font-bold">Contact us</h1>
            <p class="text-lg text-slate-600 mt-9">
                Reach out to us about any questions you might have or contributions you need to make.
            </p>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8 mt-12">
                <div class="rounded-2xl bg-slate-50 p-10">
                    <h3 class="text-base font-bold font-display text-slate-900">Support Team</h3>
                    <dl class="mt-3 space-y-1 text-sm leading-6 text-slate-600">
                        <div>
                            <dt class="sr-only">Email</dt>
                            <dd><a class="font-bold text-sky-500 hover:underline" href="mailto:tech_support@nira.org.ng">tech_support@nira.org.ng</a></dd>
                        </div>
                        <div class="mt-1">
                            <dt class="sr-only">Phone number</dt>
                            <dd><a href="tel:+2348172004276" class="hover:underline">+234 817 200 4276</a></dd>
                        </div>
                        <address class="mt-3 text-sm not-italic leading-6 text-slate-600">
                            <p>8 Funsho Williams Avenue, Iponri Surulere, Lagos, Nigeria.</p>
                        </address>
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
                            <dd><a href="tel:+2348172004272" class="hover:underline">+234 817 200 4272</a>, <a href="tel:+2348172004270" class="hover:underline">+234 817 200 4270</a></dd>
                        </div>
                        <address class="mt-3 text-sm not-italic leading-6 text-slate-600">
                            <p>8 Funsho Williams Avenue, Iponri Surulere, Lagos, Nigeria.</p>
                        </address>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
