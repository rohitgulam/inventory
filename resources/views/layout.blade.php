<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Inventory Management System</title>
</head>
<body class="bg-[#E5E5E5]" >
     <!-- component -->
<div class="w-full h-full">
            <dh-component>
                <div class="flex flex-no-wrap">
                    <!-- Sidebar starts -->
                    <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
                    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                    <div style="min-height: 100vh; position: fixed;" class="w-64 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
                        <div class="px-8">
                            <div class="h-16 w-full flex items-center">
                                <h2 class="text-white text-2xl text center">KG Transporters</h2>
                            </div>
                            <ul class="mt-12">
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>statistics</title><g stroke-width="1" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-linecap="round" class="nc-icon-wrapper"><line x1="3.5" y1="12.5" x2="3.5" y2="9.5"></line><line x1="6.5" y1="5.5" x2="6.5" y2="12.5"></line><line x1="9.5" y1="12.5" x2="9.5" y2="9.5"></line><line x1="12.5" y1="5.5" x2="12.5" y2="12.5"></line><line x1="0.5" y1="14.5" x2="15.5" y2="14.5"></line><polyline points="13.5 0.5 9.5 4.5 6.5 1.5 2.5 5.5" stroke="currentColor"></polyline></g></svg>
                                        <span class="text-sm ml-2">{{ __('Dashboard') }}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/sells" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>shopping bag</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><path d="M10.5,5.5V3 c0-1.381-1.119-2.5-2.5-2.5h0C6.619,0.5,5.5,1.619,5.5,3v2.5" data-cap="butt" stroke="currentColor"></path> <polygon points="14.5,15.5 1.5,15.5 2.5,5.5 13.5,5.5 " data-cap="butt"></polygon></g></svg>
                                        <span class="text-sm ml-2">{{ __('Sales') }}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/purchases" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>cart</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><circle cx="3" cy="14" r="1.5" data-cap="butt" stroke="currentColor"></circle> <circle cx="13" cy="14" r="1.5" data-cap="butt" stroke="currentColor"></circle> <polyline points="2.5,2.5 14.5,2.5 12.5,7.5 2.5,7.5 " data-cap="butt"></polyline> <polyline id="butt_41_" points=" 0.5,0.5 2.5,2.5 2.5,7.5 0.5,10.5 15.5,10.5 " data-cap="butt"></polyline></g>
                                        </svg>
                                        <span class="text-sm ml-2">{{ __('Purchases')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/products" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>stack</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor"" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><polygon points="8,1.5 15.5,6 8,10.5 0.5,6 " data-cap="butt"></polygon> <polyline points="14,9.1 15.5,10 8,14.5 0.5,10 2,9.1 " data-cap="butt" stroke="currentColor""></polyline> </g></svg>
                                        <span class="text-sm ml-2">{{__('Products')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/expenses" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        <span class="text-sm ml-2">{{__('Expenses')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/transport" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                                        <span class="text-sm ml-2">{{__('Transport')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/credits" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                        <span class="text-sm ml-2">{{__('Credits')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/reports" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>file text</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><line x1="4.5" y1="11.5" x2="11.5" y2="11.5" stroke="currentColor"></line> <line x1="4.5" y1="8.5" x2="11.5" y2="8.5" stroke="currentColor"></line> <line x1="4.5" y1="5.5" x2="6.5" y2="5.5" stroke="currentColor"></line> <polygon points="9.5,0.5 1.5,0.5 1.5,15.5 14.5,15.5 14.5,5.5 "></polygon> <polyline points="9.5,0.5 9.5,5.5 14.5,5.5 "></polyline></g></svg>
                                        <span class="text-sm ml-2">{{__('Reports')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4">
                                    <a href="/register" class="flex items-center py-2 px-2 w-full hover:bg-gray-100 hover:text-gray-900 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        <span class="text-sm ml-2">{{__('Users')}}</span>
                                    </a>
                                </li>
                                
                            </ul>
                            <div class="flex justify-center mt-48 mb-4 w-full">
                                <div class="relative">
                                    <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <circle cx="10" cy="10" r="7"></circle>
                                            <line x1="21" y1="21" x2="15" y2="15"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="px-8 border-t border-gray-700">
                            <ul class="w-full flex items-center justify-between bg-gray-800">
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="show notifications" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                        </svg>
                                    </button>
                                </li>
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="open chats" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path>
                                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>
                                        </svg>
                                    </button>
                                </li>
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="open settings" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </li>
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="open logs" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div> --}}
                    </div>

                    <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" id="mobile-nav">
                        <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800" onclick="sidebarHandler(true)">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="6" cy="10" r="2" />
                                <line x1="6" y1="4" x2="6" y2="8" />
                                <line x1="6" y1="12" x2="6" y2="20" />
                                <circle cx="12" cy="16" r="2" />
                                <line x1="12" y1="4" x2="12" y2="14" />
                                <line x1="12" y1="18" x2="12" y2="20" />
                                <circle cx="18" cy="7" r="2" />
                                <line x1="18" y1="4" x2="18" y2="5" />
                                <line x1="18" y1="9" x2="18" y2="20" />
                            </svg>
                        </button>
                        <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        <div class="px-8">
                            <div class="h-16 w-full flex items-center">
                                <svg aria-label="Ripples. Logo"role="img" xmlns="http://www.w3.org/2000/svg" width="144" height="30" viewBox="0 0 144 30">
                                    <path
                                        fill="#5F7DF2"
                                        d="M80.544 9.48c1.177 0 2.194.306 3.053.92.86.614 1.513 1.45 1.962 2.507.448 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.699 3.51-.465 1.037-1.136 1.851-2.012 2.444-.876.592-1.885.888-3.028.888-1.405 0-2.704-.554-3.897-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78H70.45V9.657h6.145v1.663l.209-.21c1.123-1.087 2.369-1.63 3.74-1.63zm17.675 0c1.176 0 2.194.306 3.053.92.859.614 1.513 1.45 1.961 2.507.449 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.698 3.51-.466 1.037-1.136 1.851-2.012 2.444-.876.592-1.886.888-3.028.888-1.405 0-2.704-.554-3.898-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78h-1.904V9.657h6.144v1.663l.21-.21c1.122-1.087 2.368-1.63 3.739-1.63zM24.973 1c1.13 0 2.123.433 2.842 1.133 0 .004 0 .008.034.012 1.54 1.515 1.54 3.962-.034 5.472-.035.029-.069.058-.069.089-.719.65-1.712 1.05-2.773 1.05-.719 0-1.37.061-1.985.184-2.363.474-3.8 1.86-4.28 4.13-.114.489-.18 1.02-.2 1.59l-.003.176.001-.034.002.034c.022.505-.058 1.014-.239 1.495l-.076.182.064-.157c.106-.28.18-.575.217-.881l.008-.084-.026.195c-.286 1.797-1.858 3.188-3.754 3.282l-.204.005h-.103l-.103.002h-.034c-.65.012-1.232.072-1.78.181-2.328.473-3.765 1.863-4.279 4.139-.082.417-.142.863-.163 1.339l-.008.362v.23c0 2.02-1.603 3.681-3.661 3.861L4.16 29l-.48-.01c-.958-.073-1.849-.485-2.499-1.113-1.522-1.464-1.573-3.808-.152-5.33l.152-.154.103-.12c.719-.636 1.677-1.026 2.704-1.026.754 0 1.404-.062 2.02-.184 2.362-.475 3.8-1.86 4.28-4.126.136-.587.17-1.235.17-1.942 0-.991.411-1.896 1.027-2.583.069-.047.137-.097.172-.15.068-.051.102-.104.17-.159.633-.564 1.498-.925 2.408-.978l.229-.007h.034c.068 0 .171.003.274.009.616-.014 1.198-.074 1.746-.18 2.328-.474 3.766-1.863 4.279-4.135.082-.44.142-.912.163-1.418l.008-.385v-.132c0-2.138 1.78-3.872 4.005-3.877zm-.886 10c1.065 0 1.998.408 2.697 1.073.022.011.03.024.042.036l.025.017v.015c1.532 1.524 1.532 3.996 0 5.52-.034.03-.067.06-.067.09-.7.655-1.665 1.056-2.697 1.056-.7 0-1.332.062-1.932.186-2.298.477-3.696 1.873-4.163 4.157-.133.591-.2 1.242-.2 1.95 0 1.036-.399 1.975-1.032 2.674l-.1.084c-.676.679-1.551 1.055-2.441 1.13l-.223.012-.366-.006c-.633-.043-1.3-.254-1.865-.632-.156-.096-.296-.201-.432-.315l-.2-.177v-.012c-.734-.735-1.133-1.72-1.133-2.757 0-2.078 1.656-3.793 3.698-3.899l.198-.005h.133c.666-.007 1.266-.069 1.832-.185 2.265-.476 3.663-1.874 4.163-4.161.08-.442.139-.916.159-1.424l.008-.387v-.136c0-2.153 1.731-3.899 3.896-3.904zm3.882 11.025c1.375 1.367 1.375 3.583 0 4.95s-3.586 1.367-4.96 0c-1.345-1.367-1.345-3.583 0-4.95 1.374-1.367 3.585-1.367 4.96 0zm94.655-12.672c1.405 0 2.628.323 3.669.97 1.041.648 1.843 1.566 2.406 2.756.563 1.189.852 2.57.87 4.145h-9.954l.03.251c.132.906.476 1.633 1.03 2.18.605.596 1.386.895 2.343.895 1.058 0 2.09-.525 3.097-1.574l3.301 1.066-.203.291c-.69.947-1.524 1.67-2.501 2.166-1.075.545-2.349.818-3.821.818-1.473 0-2.774-.277-3.904-.831-1.13-.555-2.006-1.34-2.628-2.355-.622-1.016-.933-2.21-.933-3.58 0-1.354.324-2.582.971-3.682s1.523-1.961 2.628-2.583c1.104-.622 2.304-.933 3.599-.933zm13.955.126c1.202 0 2.314.216 3.339.648v-.47h3.034v3.91h-3.034l-.045-.137c-.317-.848-1.275-1.272-2.875-1.272-1.21 0-1.816.339-1.816 1.016 0 .296.161.516.483.66.321.144.791.262 1.409.355 1.735.22 3.102.536 4.1.946 1 .41 1.697.919 2.095 1.524.398.605.597 1.339.597 2.202 0 1.405-.48 2.5-1.441 3.282-.96.783-2.266 1.174-3.917 1.174-1.608 0-2.7-.321-3.275-.964V23h-3.098v-4.596h3.098l.032.187c.116.547.412.984.888 1.311.53.364 1.183.546 1.962.546.762 0 1.324-.087 1.688-.26.364-.174.546-.476.546-.908 0-.296-.076-.527-.228-.692-.153-.165-.447-.31-.883-.438-.435-.127-1.102-.27-2-.431-1.997-.313-3.433-.82-4.31-1.517-.875-.699-1.313-1.64-1.313-2.825 0-1.21.455-2.162 1.365-2.856.91-.695 2.11-1.042 3.599-1.042zm-69.164.178v10.27h1.98V23h-8.24v-3.072h2.032V12.78h-2.031V9.657h6.259zm-16.85-5.789l.37.005c1.94.05 3.473.494 4.6 1.335 1.198.892 1.797 2.185 1.797 3.878 0 1.168-.273 2.15-.819 2.945-.546.796-1.373 1.443-2.482 1.943l3.085 5.776h2.476V23h-5.827l-4.317-8.366h-2.183v5.116h2.4V23H39.646v-3.25h2.628V7.118h-2.628v-3.25h10.918zm61.329 0v16.06h1.892V23h-8.24v-3.072h2.082v-13h-2.082v-3.06h6.348zm-32.683 9.04c-.812 0-1.462.317-1.949.951-.486.635-.73 1.49-.73 2.565 0 1.007.252 1.847.756 2.52.503.673 1.161 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.448-.622.672-1.504.672-2.647 0-1.092-.228-1.942-.685-2.552-.457-.61-1.113-.914-1.968-.914zm17.675 0c-.813 0-1.463.317-1.95.951-.486.635-.73 1.49-.73 2.565 0 1.007.253 1.847.756 2.52.504.673 1.162 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.449-.622.673-1.504.673-2.647 0-1.092-.229-1.942-.686-2.552-.457-.61-1.113-.914-1.967-.914zM14.1 0C16.267 0 18 1.743 18 3.894v.01c0 2.155-1.733 3.903-3.9 3.903-4.166 0-6.3 2.133-6.3 6.293 0 2.103-1.667 3.817-3.734 3.9l-.5-.009c-.933-.075-1.8-.49-2.433-1.121C.4 16.134 0 15.143 0 14.1c0-2.144 1.733-3.903 3.9-3.903 4.166 0 6.3-2.133 6.3-6.294C10.2 1.751 11.934.005 14.1 0zm108.32 12.184c-.76 0-1.372.22-1.834.66-.46.44-.75 1.113-.87 2.018h5.561c-.118-.795-.442-1.44-.97-1.936-.53-.495-1.158-.742-1.886-.742zM49.525 7.118h-2.26v4.444h1.829c2.023 0 3.034-.754 3.034-2.26 0-.728-.233-1.274-.698-1.638-.466-.364-1.1-.546-1.905-.546zm15.821-3.593c.635 0 1.183.231 1.644.692.462.462.692 1.01.692 1.644 0 .677-.23 1.238-.692 1.682-.46.445-1.009.667-1.644.667-.643 0-1.195-.23-1.656-.692-.462-.461-.692-1.013-.692-1.657 0-.634.23-1.182.692-1.644.46-.461 1.013-.692 1.656-.692zM5.991 1.171c1.345 1.563 1.345 4.095 0 5.658-1.374 1.561-3.585 1.561-4.96 0-1.375-1.563-1.375-4.095 0-5.658 1.375-1.561 3.586-1.561 4.96 0z"
                                    />
                                </svg>
                            </div>
                            {{-- <ul class="mt-12">
                                <li class="flex w-full justify-between text-gray-300 hover:text-gray-500 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-sm ml-2">Dashboard</span>
                                    </a>
                                    <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">5</div>
                                </li>
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-sm ml-2">Products</span>
                                    </a>
                                    <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
                                </li>
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-sm ml-2">Performance</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="7 8 3 12 7 16"></polyline>
                                            <polyline points="17 8 21 12 17 16"></polyline>
                                            <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                        <span class="text-sm ml-2">Deliverables</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-sm ml-2">Invoices</span>
                                    </a>
                                    <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
                                </li>
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                            <polyline points="4 12 12 16 20 12" />
                                            <polyline points="4 16 12 20 20 16" />
                                        </svg>
                                        <span class="text-sm ml-2">Inventory</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <span class="text-sm ml-2">Settings</span>
                                    </a>
                                </li>
                            </ul> --}}
                            <ul class="mt-12">
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4 py-2 px-2 hover:bg-gray-100 hover:text-gray-900">
                                    <a href="/" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>statistics</title><g stroke-width="1" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-linecap="round" class="nc-icon-wrapper"><line x1="3.5" y1="12.5" x2="3.5" y2="9.5"></line><line x1="6.5" y1="5.5" x2="6.5" y2="12.5"></line><line x1="9.5" y1="12.5" x2="9.5" y2="9.5"></line><line x1="12.5" y1="5.5" x2="12.5" y2="12.5"></line><line x1="0.5" y1="14.5" x2="15.5" y2="14.5"></line><polyline points="13.5 0.5 9.5 4.5 6.5 1.5 2.5 5.5" stroke="currentColor"></polyline></g></svg>
                                        <span class="text-sm ml-2">{{__('summary')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4 py-2 px-2 hover:bg-gray-100 hover:text-gray-900">
                                    <a href="/sales" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>shopping bag</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><path d="M10.5,5.5V3 c0-1.381-1.119-2.5-2.5-2.5h0C6.619,0.5,5.5,1.619,5.5,3v2.5" data-cap="butt" stroke="currentColor"></path> <polygon points="14.5,15.5 1.5,15.5 2.5,5.5 13.5,5.5 " data-cap="butt"></polygon></g></svg>
                                        <span class="text-sm ml-2">{{__('sales')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4 py-2 px-2 hover:bg-gray-100 hover:text-gray-900">
                                    <a href="/purchases" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>cart</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><circle cx="3" cy="14" r="1.5" data-cap="butt" stroke="currentColor"></circle> <circle cx="13" cy="14" r="1.5" data-cap="butt" stroke="currentColor"></circle> <polyline points="2.5,2.5 14.5,2.5 12.5,7.5 2.5,7.5 " data-cap="butt"></polyline> <polyline id="butt_41_" points=" 0.5,0.5 2.5,2.5 2.5,7.5 0.5,10.5 15.5,10.5 " data-cap="butt"></polyline></g>
                                        </svg>
                                        <span class="text-sm ml-2">{{__('purchases')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4 py-2 px-2 hover:bg-gray-100 hover:text-gray-900">
                                    <a href="/products" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>stack</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor"" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><polygon points="8,1.5 15.5,6 8,10.5 0.5,6 " data-cap="butt"></polygon> <polyline points="14,9.1 15.5,10 8,14.5 0.5,10 2,9.1 " data-cap="butt" stroke="currentColor""></polyline> </g></svg>
                                        <span class="text-sm ml-2">{{__('product')}}</span>
                                    </a>
                                </li>
                                <li class="flex w-full justify-between rounded text-gray-300 cursor-pointer items-center mb-4 py-2 px-2 hover:bg-gray-100 hover:text-gray-900">
                                    <a href="/reports" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 16 16"><title>file text</title><g stroke-width="1" stroke-linecap="round" fill="none" stroke="currentColor" stroke-miterlimit="10" class="nc-icon-wrapper" stroke-linejoin="round"><line x1="4.5" y1="11.5" x2="11.5" y2="11.5" stroke="currentColor"></line> <line x1="4.5" y1="8.5" x2="11.5" y2="8.5" stroke="currentColor"></line> <line x1="4.5" y1="5.5" x2="6.5" y2="5.5" stroke="currentColor"></line> <polygon points="9.5,0.5 1.5,0.5 1.5,15.5 14.5,15.5 14.5,5.5 "></polygon> <polyline points="9.5,0.5 9.5,5.5 14.5,5.5 "></polyline></g></svg>
                                        <span class="text-sm ml-2">{{__('report')}}</span>
                                    </a>
                                </li>
                                
                            </ul>
                            <div class="flex justify-center mt-48 mb-4 w-full">
                                <div class="relative">
                                    <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <circle cx="10" cy="10" r="7"></circle>
                                            <line x1="21" y1="21" x2="15" y2="15"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="px-8 border-t border-gray-700">
                            <ul class="w-full flex items-center justify-between bg-gray-800">
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="show notifications" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                        </svg>
                                    </button>
                                </li>
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                   <button aria-label="open chats" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                       <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z"></path>
                                           <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path>
                                           <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>
                                       </svg>
                                   </button>
                                </li>
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="open settings" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </li>
                                <li class="cursor-pointer text-white pt-5 pb-3">
                                    <button aria-label="open logs" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <!-- Sidebar ends --> 
                    <!-- Remove class [ h-64 ] when adding a card block -->
                    <div style="width:100vw;" class="ml-64 pb-6 md:w-4/5 w-11/12">
                        <x-flash-message/>
                        <header class="p-4 flex flex-row-reverse justify-between bg-white" >
                            @auth
                            <div class="mx-6 py-2 px-4 flex">
                                
                                <p class="mr-8">Welcome, {{auth()->user()->name}}</p>

                                <form action="/logout" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> 
                                        <span class="ml-2">Logout</span>
                                    </button>
                                </form>
                            </div>
                            @endauth
                            <div class="flex">
                                <div class="mx-2">
                                    <button
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-2 px-4"
                                        id="add-expense-button"
                                    >
                                        {{__('Register Expenses')}}
                                    </button>
                                        
                                    <x-add-expense-form/>                                      
                                </div>

                                <div class="mx-2">
                                    <button
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-2 px-4"
                                        id="nav-add-product-button"
                                    >
                                    {{__('Register Products')}}
                                    </button>

                                    <x-add-product-form/>                                       
                                </div>
        
                            </div>

                            
                        </header>
                        <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
                        <div class="w-full mx-auto px-6 py-4 rounded">
                            <!-- Place your content here -->
                            {{-- VIEW OUTPUT --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
                
                
            </dh-component>
        </div>

        @vite('resources/js/app.js')
</body>
</html>
 
