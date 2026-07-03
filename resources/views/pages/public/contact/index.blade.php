<div style="background-image: url('src/img/bg-footer.png') "
    class=" h-[800px] w-full bg-center bg-cover bg-no-repeat flex flex-col items-center justify-center">
    <div class="w-full h-full relative py-10 md:py-45 grid md:grid-cols-1 md:grid-cols-2">
        <div class=" container md:order-1 order-2  ">
            <!--@if (Session('success'))
-->
            <!--    <div class="alert alert-success">{{ Session::get('success') }}</div>-->
            <!--
@endif-->
            <form method="POST" action="{{ route('contact.us') }}" id="contactForm"
                class="max-w-sm mx-auto font-AbhayaLibre px-[10px]">
                @csrf
                <div id="statusMessage" class="text-white mt-5"></div> <br>
                <div class="mb-5">
                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading text-BG-White">
                        Name</label>
                    <input type="text" id="name" name="name"
                        class=" bg-white opacity-20   text-heading text-sm   block w-full px-3 py-2.5  placeholder:text-BG-IExxass"
                        placeholder="Your Name" required />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2.5 text-sm font-medium text-heading text-BG-White">
                        email</label>
                    <input type="email" id="email" name="email"
                        class=" bg-white opacity-20   text-heading text-sm   block w-full px-3 py-2.5  placeholder:text-BG-IExxass"
                        placeholder="Your Email Address" required />
                </div>
                <div class="mb-5">
                    <label for="subject" class="block mb-2.5 text-sm font-medium text-heading text-BG-White">
                        Subject</label>
                    <input type="text" id="subject" name="subject"
                        class=" bg-white opacity-20   text-heading text-sm   block w-full px-3 py-2.5  placeholder:text-BG-IExxass"
                        placeholder="Your Subject" required />
                </div>
                <div class="mb-5">
                    <label for="message"
                        class="block mb-2.5 text-sm font-medium text-heading text-BG-White">Description
                    </label>
                    <textarea type="message" id="message" rows="4" name="message"
                        class=" bg-white opacity-20   text-heading text-sm   block w-full px-3 py-2.5  placeholder:text-BG-IExxass"
                        placeholder="your message" required> </textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                <button type="submit" id="submitBtn"
                    class="text-white bg-BG-IExxass  text-sm px-10 py-2.5 mt-5 focus:outline-none">Submit</button>
            </form>

        </div>
        <div
            class="container mx-auto px-[20px] lg:px-0 items-center text-center md:text-left font-AbhayaLibre text-white md:py-20 md:order-2 order-1 ">
            <h1 class="header text-[30px] lg:text-[50px] xl:text-[70px] font-extrabold racking-[5px]">Contact Us</h1>
            <h1 class="header text-[25px] lg:text-[35px] xl:text-[45px] tracking-[5px] md:tracking-[12px]">CONTACT US!
                REACH
                <br> OUT VIA MESSAGE! <br> HOW CAN WE HELP?
            </h1>
        </div>
    </div>

    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
