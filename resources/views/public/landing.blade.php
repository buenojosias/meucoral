<x-public-layout>
    @slot('title', 'Gestão de corais')
    <div class="relative isolate px-0 md:px-6 pt-8 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-fuchsia-200 to-primary-300 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between mx-auto max-w-5xl py-2 md:py-24 md:pt-16">
            <div class="w-full md:w-2/5 px-8 md:px-0">
                {{-- <div class="hidden sm:mb-8 sm:flex sm:justify-start">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Who's using Suggest.gg? <a href="/creators" class="font-semibold text-primary-600"><span
                                class="absolute inset-0" aria-hidden="true"></span>See creators <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                </div> --}}
                <div>
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 md:text-6xl">Simplifique a gestão do
                        seu coral!</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Transforme a organização do seu coral com uma
                        plataforma completa, intuitiva e feita sob medida para regentes e gestores.</p>
                    <div class="mt-10 flex items-center justify-start gap-x-6">
                        <a href="{{ route('auth.register') }}"
                            class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Criar
                            conta</a>
                        {{-- <a href="/demo" class="text-sm font-semibold leading-6 text-gray-900">View demo <span
                                aria-hidden="true">→</span></a> --}}
                    </div>
                </div>
            </div>
            <div class="md:w-3/5 ml-4 mt-4 md:mt-12 pl-8 py-8 md:pl-0 md:py-0 overflow-hidden md:overflow-visible">
                <div class="rounded-lg shadow-lg bg-white px-6 py-2 rotate-2">
                    <img src="/images/suggest-landing-screenshot-1.png">
                </div>
                <div class="rounded-lg shadow-lg bg-white px-6 py-2 rotate-3 mt-4 translate-x-4">
                    <img src="/images/suggest-landing-screenshot-2.png">
                </div>
                <div class="rounded-lg shadow-lg bg-white px-6 py-2 rotate-2 mt-4 -translate-x-2">
                    <img src="/images/suggest-landing-screenshot-3.png">
                </div>
                <div class="rounded-lg shadow-lg bg-white px-6 py-2 rotate-3 mt-4 translate-x-2">
                    <img src="/images/suggest-landing-screenshot-4.png">
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-primary-400 to-fuchsia-300 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
    <main>
        <div class="overflow-hidden py-8 px-8 md:px-0 md:py-24" id="recursos">
            <div class="mx-auto max-w-5xl">
                <div
                    class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                    <div class="lg:pr-8 lg:pt-4">
                        <div class="lg:max-w-lg">
                            <h2 class="text-base font-semibold leading-7 text-primary-600">Para você</h2>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Painel
                                administrativo fácil de usar</p>
                            <p class="mt-6 text-lg leading-8 text-gray-600">Deixe o trabalho pesado conosco, para
                                que você possa focar no que realmente importa: a música.</p>
                            <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            with="24" height="24"
                                            class="absolute left-1 top-1 h-5 w-5 text-primary-600" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                                        </svg>
                                        Organização total em um só lugar.
                                    </dt>
                                    <dd class="inline">Gerencie coralistas, ensaios, eventos e finanças de forma
                                        prática e centralizada.</dd>
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="absolute left-1 top-1 h-5 w-5 text-primary-600"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>
                                        Planejamento de ensaios e eventos simplificado.
                                    </dt>
                                    <dd class="inline">Crie planejamentos detalhados, controle presenças e otimize
                                        a dinâmica do seu coral.</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <img src="/images/suggest-landing-dashboard.png" alt="Product screenshot"
                        class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0 z-10"
                        width="2648" height="1469">
                </div>
            </div>
        </div>
        <div class="overflow-hidden py-8 px-8 md:px-0 md:py-24">
            <div class="mx-auto max-w-5xl">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2"
                    dir="rtl">
                    <div class="lg:pl-8 lg:pt-4">
                        <div class="lg:max-w-lg" dir="ltr">
                            {{-- <h2 class="text-base font-semibold leading-7 text-primary-600">E tem mais</h2> --}}
                            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Por que
                                escolher nossa ferramenta?</p>
                            <p class="mt-6 text-lg leading-8 text-gray-600">Nosso sistema foi criado para regentes
                                que querem mais tempo para a música e menos preocupações com a administração.</p>
                            <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="absolute left-1 top-1 h-5 w-5 text-primary-600"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                        </svg>
                                        Fácil de usar:
                                    </dt>
                                    <dd class="inline">Sem complicações, para regentes e gestores de qualquer nível
                                        técnico.</dd>
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="absolute left-1 top-1 h-5 w-5 text-primary-600"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                        Funcionalidades exclusivas:
                                    </dt>
                                    <dd class="inline">Tudo o que você precisa, nada do que você não precisa.</dd>
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="absolute left-1 top-1 h-5 w-5 text-primary-600"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                            <circle cx="8.5" cy="7" r="4" />
                                            <polyline points="17 11 19 13 23 9" />
                                        </svg>
                                        Suporte dedicado:
                                    </dt>
                                    <dd class="inline">Estamos aqui para ajudar em cada passo.</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <img src="/images/suggest-landing-profile.png" alt="Product screenshot"
                        class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0 z-10"
                        width="2488" height="1464">
                </div>
            </div>
        </div>
        <div class="py-8 px-8 md:px-0 md:py-24" id="preco">
            <div class="mx-auto max-w-5xl">
                <div class="mx-auto max-w-2xl sm:text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Lançamento exclusivo!
                    </h2>
                    <p class="my-6 text-lg leading-8 text-gray-600">Acesse todos os recursos gratuitamente nas
                        primeiras atualizações e ajude a moldar o futuro da plataforma.</p>
                    <x-ts-button text="Comece a usar agora!" :href="route('auth.register')" lg />
                </div>
                {{-- <div class="flex flex-col md:flex-row items-center md:items-start justify-between md:space-x-8">
                        <div
                            class="w-full md:w-1/2 mx-auto mt-8 md:mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                            <div class="p-8 sm:p-10 lg:flex-auto">
                                <h3 class="text-2xl font-bold tracking-tight text-gray-900">Basic &mdash; 100% free
                                </h3>
                                <p class="mt-6 text-base leading-7 text-gray-600">No limits on the amount of ideas or
                                    suggestions, plus basic themes and stats.</p>
                                <div class="mt-10 flex items-center gap-x-4">
                                    <h4 class="flex-none text-sm font-semibold leading-6 text-primary-600">What’s
                                        included</h4>
                                    <div class="h-px flex-auto bg-gray-100"></div>
                                </div>
                                <ul role="list"
                                    class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Unlimited ideas
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Email notifications
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Page themes
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Basic analytics
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-1/2 mx-auto mt-4 md:mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                            <div class="p-8 sm:p-10 lg:flex-auto">
                                <h3 class="text-2xl font-bold tracking-tight text-gray-900">Pro &mdash; $15/mo</h3>
                                <p class="mt-6 text-base leading-7 text-gray-600">More advanced features like a custom
                                    domain and detailed analytics. <span class="font-semibold">Coming soon.</span></p>
                                <div class="mt-10 flex items-center gap-x-4">
                                    <h4 class="flex-none text-sm font-semibold leading-6 text-primary-600">What’ll be
                                        included</h4>
                                    <div class="h-px flex-auto bg-gray-100"></div>
                                </div>
                                <ul role="list"
                                    class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Custom domain
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Multiple boards
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Advanced analytics
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-primary-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Theme customization
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
        <div class="bg-white py-8 px-8 md:px-0 md:py-24" id="faq">
            <div class="mx-auto max-w-5xl">
                <div class="flex flex-col md:flex-row items-start">
                    <div class="w-full md:w-2/5 md:pr-8 mb-8 md:mb-0">
                        <h3 class="text-2xl font-bold mb-4">Perguntas frequentes</h3>
                        <p class="text-base leading-7 text-gray-600">Não encontrou a resposta que procurava?
                            Mande-nos uma mensagem pelo e-mail <a href="mailto:suporte@coralize.com.br"
                                class="font-semibold hover:text-primary-600 underline decoration-dashed">suporte@coralize.com.br</a>.
                        </p>
                    </div>
                    <div class="w-full md:w-3/5 text-base leading-7 text-gray-600">
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-900">O que é o SaaS de gestão de corais e como ele
                                funciona?</h4>
                            <p>Nosso SaaS é uma plataforma online que ajuda regentes e gestores a organizarem todos
                                os aspectos do coral: cadastro de coralistas, ensaios, eventos, músicas, avaliações
                                vocais e até a gestão financeira. Basta criar uma conta, configurar seu coral e
                                começar a usar as ferramentas intuitivas para simplificar sua rotina.</p>
                        </div>
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-900">É necessário ter conhecimento técnico para usar
                                a plataforma?</h4>
                            <p>Não! Nossa plataforma foi desenvolvida para ser simples e fácil de usar, mesmo para
                                quem não tem muita experiência com tecnologia. Fornecemos tutoriais e suporte para
                                ajudá-lo a começar rapidamente.</p>
                        </div>
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-900">Quais funcionalidades o sistema oferece?
                            </h4>
                            <ul class="list-disc list-inside">
                                <li>Cadastro e organização de coralistas e grupos</li>
                                <li>Planejamento de ensaios e controle de presenças</li>
                                <li>Gerenciamento de músicas</li>
                                <li>Registro e planejamento de eventos, incluindo confirmação dos coralistas</li>
                            </ul>
                            <p class="pl-6 italic">E vem mais por aí!</p>
                        </div>
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-900">O sistema é seguro? Meus dados estarão
                                protegidos?</h4>
                            <p>Sim, a segurança é uma prioridade para nós. Usamos criptografia para proteger seus
                                dados e de seus coralistas, seguindo as melhores práticas de segurança da informação
                                para garantir que
                                tais informações estejam sempre seguras.</p>
                        </div>
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-900">O que está incluso na versão gratuita?</h4>
                            <p>Na versão gratuita, você terá acesso a todas as funcionalidades básicas, como
                                cadastro de coralistas, ensaios, eventos e músicas. Recursos avançados, como gestão
                                financeira e análises detalhadas, estarão disponíveis em planos pagos após o período
                                de lançamento gratuito.</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Como posso começar a usar o sistema?</h4>
                            <p>É fácil! Clique no botão <strong>Criar conta</strong>, cadastre-se em poucos minutos e
                                comece a explorar todas as funcionalidades que oferecemos. Estamos aqui para te
                                ajudar em cada etapa!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="bg-gradient-to-br from-blue-500 to-primary-600">
        <div class="mx-auto max-w-5xl py-8 px-8 md:px-0 md:py-20">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="w-full md:w-3/5 mb-4 md:mb-0 text-center md:text-left">
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white opacity-50 sm:text-4xl">Pronto para
                        começar?</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Crie uma conta grátis!
                    </p>
                </div>
                <div class="w-full md:w-2/5 text-center md:text-right">
                    <a href="{{ route('auth.register') }}"
                        class="bg-white rounded-lg shadow inline-block text-base font-bold text-gray-900 py-3 px-6 hover:shadow-lg hover:opacity-90 transition-all ease-in-out duration-150">Criar
                        conta &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
