<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
</head>
<body class="bg-white">
<div class="fixed sf-sidebar-nav w-[400px] z-[999] bg-grey-300 top-0 bottom-0 h-full overflow-y-auto">
    <div class="p-[30px]">
        <div class="flex justify-end items-center mb-6">
            <button class="button text-grey-400 hover:bg-transparent p-0" id="sf-close-sidebar">
                <i class="eicon-close !text-3xl"></i>
            </button>
        </div>
        <div class="flex items-center mb-5 pt-2.5 px-2.5">
            <?php if ( is_user_logged_in() ) : ?>

                <?php
                $user = wp_get_current_user();
                $name = trim( $user->first_name . ' ' . $user->last_name );
                if (!$name) {
                    $name = $user->display_name;
                }
                ?>

                <div class="font-acumin text-2xl font-semibold text-grey">
                    Hi, <?php echo esc_html($name); ?>
                </div>

                <a class="underline px-[5px] text-[22.5px] leading-[42.5px] text-orange"
                   href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">
                    sign out
                </a>

            <?php else : ?>

                <div class="font-acumin text-2xl font-semibold text-grey">
                    Howdy!
                </div>

                <a class="underline px-[5px] text-[22.5px] leading-[42.5px] text-orange"
                   href="/sign-in/">
                    sign in
                </a>

            <?php endif; ?>

        </div>
        <h2 class="font-acumin-pro-condensed font-semibold text-[22px] leading-[37px] text-grey-700 mb-5 px-2.5">
            Shop by department
        </h2>

        <div class="mb-5 px-2.5">
            <div class="sf-slide-menu relative overflow-hidden">
                <?php
                wp_nav_menu([
                    'theme_location' => 'shop_department_menu',
                    'container'      => false,
                    'menu_class'     => 'sf-slide-menu__menu',
                    'walker'         => new  SF_Mobile_Walker()
                ]);
                ?>
            </div>
        </div>
        <h2 class="font-acumin-pro-condensed font-semibold text-[22px] leading-[37px] text-grey-700 mb-5 px-2.5">
            Help
        </h2>
        <div class="mb-5 px-2.5">
            <?php
            wp_nav_menu([
                'theme_location' => 'help_menu',
                'container'      => false,
                'menu_class'     => 'sf-slide-menu-default',
                'walker'         => new  SF_Mobile_Walker()
            ]);
            ?>
        </div>
        <h2 class="font-acumin-pro-condensed font-semibold text-[22px] leading-[37px] text-grey-700 mb-5 px-2.5">
            Company
        </h2>
        <div class="mb-5 px-2.5">
            <?php
            wp_nav_menu([
                'theme_location' => 'company_menu',
                'container'      => false,
                'menu_class'     => 'sf-slide-menu-default',
                'walker'         => new  SF_Mobile_Walker()
            ]);
            ?>
        </div>
    </div>
</div>
<div class="sf-main-wrapper">
    <header>
        <div class="bg-orange-400 lg:bg-white flex flex-nowrap items-center w-full h-10 px-5 lg:justify-between">
            <div class="hidden lg:flex gap-4">
                <a href="tel:8778722417" class="text-sm font-acumin text-grey hover:text-orange transition-all duration-200 ease-linear flex items-center">
                    <i aria-hidden="true" class="fas fa-phone-alt w-[1.25em] text-blue"></i>
                    <span class="pl-[5px] text-[13.5px] font-acumin">Call us toll free: <strong>(877) 872-2417</strong></span>
                </a>
                <a href="/financing-application/" target="_blank" rel="nofollow" class="text-sm font-acumin text-grey hover:text-orange transition-all duration-200 ease-linear flex items-center">
                    <i aria-hidden="true" class="far fa-money-bill-alt text-blue w-[1.25em]"></i>
                    <span class="pl-[5px] text-[13.5px] font-acumin"><b>Need Financing?</b> <span class="text-orange-300">Get the cash you need</span></span>
                </a>
            </div>
            <div class="flex justify-between w-full lg:w-auto lg:justify-end">
                <div class="flex items-center gap-1">
                    <a class="text-[15px] font-acumin font-medium text-white lg:text-grey hover:text-orange transition-all duration-200 ease-linear" href="https://saffordequipment.com/sign-in/">Login</a>
                    <div class="text-white lg:text-grey font-acumin text-lg font-bold">|</div>
                    <a class="text-[15px] font-acumin font-medium text-white lg:text-grey hover:text-orange transition-all duration-200 ease-linear" href="https://saffordequipment.com/register/">Register</a>
                </div>


                <div class="relative group">

                    <!-- Cart Button -->
                    <!-- Overlay -->
                    <div id="cartOverlay" class="fixed inset-0 scale-100 bg-black/25 hidden lg:hidden z-40 transition-all duration-400"></div>
                    <button
                        id="cartButton"
                        class="flex items-center pl-10 pr-5 py-2.5 text-white lg:text-grey bg-transparent border-none hover:bg-transparent">
                        <span class="font-acumin font-bold text-15 text-white lg:text-grey mr-1 hidden lg:block">$849.78</span>
                        <span class="relative text-white lg:text-grey leading-5">
                <i class="text-lg leading-5 eicon-cart-medium"></i>
                <div id="cartCount" class="absolute -top-2.5 -right-[11px] bg-orange text-white font-bold rounded-full text-xxs leading-4 inline-block min-w-4">3</div>
              </span>
                    </button>

                    <!-- Dropdown Cart -->
                    <div
                        id="cartDropdown"
                        class="lg:group-hover:block absolute top-0 lg:top-auto -right-5 lg:pt-0.5 z-50">
                        <div class="w-[350px] bg-white pt-5 pb-10 px-[30px] shadow-sm">
                            <div class="flex justify-end mb-5">
                                <button
                                    id="closeButton"
                                    class="text-4xl text-grey focus:outline-none bg-transparent hover:bg-transparent">
                                    &times;
                                </button>
                            </div>

                            <?php woocommerce_mini_cart(); ?>
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="bg-orange-500 px-2.5 py-[5px] flex flex-wrap items-center">
            <div class="p-2.5 w-full tablet:w-[30%]">
                <div class="flex flex-row items-center tablet:justify-start">
                    <a href="https://saffordequipment.com" class="w-[15%] tablet:w-[10%] pr-2.5">
                        <img width="1000" height="1146" alt="" class="w-full" data-srcset="https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo.png 1000w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-262x300.png 262w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-894x1024.png 894w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-768x880.png 768w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-247x283.png 247w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-510x584.png 510w" data-src="https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo.png" data-sizes="(max-width: 1000px) 100vw, 1000px" class="attachment-full size-full wp-image-53967 lazyloaded" src="https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo.png" loading="lazy" sizes="(max-width: 1000px) 100vw, 1000px" srcset="https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo.png 1000w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-262x300.png 262w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-894x1024.png 894w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-768x880.png 768w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-247x283.png 247w, https://equipment-media.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/02/26102315/safford-equipment-abb-logo-510x584.png 510w">
                    </a>
                    <a href="https://saffordequipment.com" class="w-3/5 tablet:w-[58%] text-center lg:text-left">
                        <img width="282" height="17" alt="" class="lg:w-[90%] inline-block" data-src="https://saffordequipment.com/wp-content/uploads/2022/02/SAFFORD-EQUIP-logotype.svg" class="attachment-large size-large wp-image-53968 lazyloaded" src="https://saffordequipment.com/wp-content/uploads/2022/02/SAFFORD-EQUIP-logotype.svg" loading="lazy">
                    </a>

                    <div class="sf-hamburger sf-hamburger-white flex items-center gap-3 cursor-pointer tablet:hidden ml-auto"
                         aria-expanded="false"
                         aria-controls="navigation">
                <span class="w-8 h-4 relative">
                  <span class="sf-hamburger-icon">
                  </span>
                </span>
                    </div>
                </div>
            </div>
            <div class="p-2.5 w-full tablet:w-[69.666%]">
                <div class="relative">
                    <form class="ee-form ee-search-form ee-search-form-skin--classic" role="search" action="https://saffordequipment.com/search-results" method="get" value="">
                        <div class="rounded-[5px] overflow-hidden border border-orange-100">
                            <div class="flex flex-grow items-stretch">
                                <div class="flex-grow">
                                    <input placeholder="What are you looking for?"
                                           class="bg-white py-0 px-6 min-h-12 w-full appearance-none outline-none text-lg font-acumin font-medium text-grey-darker placeholder:text-grey-600"
                                           type="search"
                                           name="q"
                                           title="Search"
                                           value=""
                                           id="ispbxii_0"
                                           autocomplete="OfF"
                                           autocorrect="off"
                                           autocapitalize="off"
                                           aria-label="Search"
                                           aria-autocomplete="list"
                                           isp_ac="OfF">
                                </div>
                                <button class="px-6 bg-orange-200 text-white" type="submit">
                                    <span class="hidden">Search</span>
                                    <i class="fas fa-search rotate-90 text-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden tablet:flex bg-white h-[73px] items-center mx-auto px-[50px]">
            <div class="sf-hamburger flex items-center gap-3 cursor-pointer"
                 aria-expanded="false"
                 aria-controls="navigation">
            <span class="w-[26px] h-4 relative">
              <span class="sf-hamburger-icon sf-hamburger-icon-sm">
              </span>
            </span>
                <span class="font-acumin-wide font-bold text-lg text-grey">
              Shop products
            </span>
            </div>
        </div>
    </header>

