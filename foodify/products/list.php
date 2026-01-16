<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Foodify - Handcrafted Chaku Yomari</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#97303c", // Maroon
                        "mustard": "#d4a017",
                        "beige": "#f5f5dc",
                        "background-light": "#fafaf9",
                        "background-dark": "#171a1c",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .custom-shadow {
            box-shadow: 0 10px 30px -10px rgba(151, 48, 60, 0.1);
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-[#161213] dark:text-gray-100 min-h-screen">
<!-- Top Navigation -->
<header class="sticky top-0 z-50 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-solid border-[#f4f1f1] dark:border-gray-800">
<div class="max-w-[1200px] mx-auto px-6 py-4 flex items-center justify-between">
<div class="flex items-center gap-12">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined text-3xl font-bold">restaurant_menu</span>
<h1 class="text-2xl font-bold tracking-tight text-[#161213] dark:text-white">Foodify</h1>
</div>
<nav class="hidden md:flex items-center gap-8">
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Menu</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Catering</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Our Story</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative group hidden lg:block">
<input class="w-64 pl-10 pr-4 py-2 bg-gray-100 dark:bg-gray-800 border-none rounded-full text-sm focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Search Newari delicacies..." type="text"/>
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">search</span>
</div>
<button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full relative">
<span class="material-symbols-outlined">shopping_bag</span>
<span class="absolute top-0 right-0 bg-primary text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center">2</span>
</button>
<button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full">
<span class="material-symbols-outlined">person</span>
</button>
</div>
</div>
</header>
<main class="max-w-[1200px] mx-auto px-6 py-8">
<!-- Breadcrumbs -->
<div class="flex items-center gap-2 mb-8 text-sm font-medium text-gray-500 dark:text-gray-400">
<a class="hover:text-primary transition-colors" href="#">Home</a>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<a class="hover:text-primary transition-colors" href="#">Sweets</a>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-primary font-bold">Yomari</span>
</div>
<!-- Product Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">
<!-- Left: Image Gallery -->
<div class="lg:col-span-7 space-y-4">
<div class="aspect-[4/5] bg-white dark:bg-gray-800 rounded-2xl overflow-hidden custom-shadow">
<div class="w-full h-full bg-center bg-no-repeat bg-cover" data-alt="Close up shot of steaming hot Chaku Yomari with molasses filling" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDNUR0fAwgwc_MlueDQSIiNpcqjPOQKfvebKiLNaBr3ySbaTR6eF39TzDaeEavqk2iZKFy8lkdxXYfW8xOa9G1GRlrRel4pTuRUwYkg8RuM7pTeveJKTp2QgeimQ4tjA6Cd4YP_h9h1vCrETDPyKThE2fW3OfoO39fcF6XzP_w7M9pZO-ekg_kO95mZWby4bLTvuBVf-VJxCBGyfK48hk9kjCNc4u7sxyuyq-OIiDy_A9bI1GHdywGiIJwvEJ909c9mJasV_PM02J0");'>
</div>
</div>
<div class="grid grid-cols-4 gap-4">
<div class="aspect-square rounded-xl overflow-hidden border-2 border-primary cursor-pointer ring-offset-2 ring-primary">
<div class="w-full h-full bg-center bg-no-repeat bg-cover" data-alt="Close up of rice flour dough texture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA366geLhoncckabm5VuRM-rDrMq7Hz75Tpnjh9BmT4s3LjX2GqnRosFtcxI0tf8PSjRCrX8ms_JkhPgKXJhUWmyyOLm_IM6lTsOXT8EBlLv7g9_tavwa015kAR96Bu0ecSX4RBD2Ik6PN8S4JFCUHwRvSsjKKBquIFDaIIRaPlqcvnUSBJLcHriQ7Sp0ORUw5ppCCQNumy49vUT7XmibxCaO1rKjHGqfdflLHM4VIVFUHISqo6BzUIw26Uc_Yu6cXITqHOdyvXNE4");'></div>
</div>
<div class="aspect-square rounded-xl overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
<div class="w-full h-full bg-center bg-no-repeat bg-cover" data-alt="Chaku filling pouring out of a Yomari" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBKu1693RdNHPQVs4xfvyM70NQhmazcg4BbIFh_NosHMOCrie55AmUQTd0njtzMVlNbPKHcRmFCLeuVGdoAvPKJFIZ6NcYh1LrfMKDfJiPdS7sftm-nucSOd328aYa_-6yqJ6op1FbFIZRHdk8F1KtmZdlrYWfxv3bJVFkR7bFLYSsQtIZViNUeogw_foaultXzammkNnxsc4pROzeQDpF6Qd_aEGZL9m6qyAVfei11ao8f3VU14_M0Es8Ktjc1WoINz_OUZ3_ihj4");'></div>
</div>
<div class="aspect-square rounded-xl overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
<div class="w-full h-full bg-center bg-no-repeat bg-cover" data-alt="Traditional Newari steamer with multiple yomaris" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB93WN8cNPZXojdH1HLNdKFas8UtspOXLkp-PXMbJC05rez8npLBOVdSZMFsOW4BM1WpF6bbhhJ_43d4Ur-WANmjkhI8RE0Qafx4GYAjYQ2QYdrQH_MZ7GbeBVBMEeFU6KzxAh-YDZvFV6ki_Wa8vfbHD0HBx-cAViVtlHyvsgr0WTfhjrY2dV506byMLDWC0VjIHcgXA8fgo-xz04EM_3MajdX-Cd04mObiIXoK5HCp0yd3rffHiegtXMTmp4ligEXltQ9iQfPcv8");'></div>
</div>
<div class="aspect-square rounded-xl overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
<div class="w-full h-full bg-center bg-no-repeat bg-cover" data-alt="Yomari served on a traditional brass plate" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCDf7OEIDhC0_v4iUT4lgcLzXrXq8_q4tqR7es_rqb6Ds35fskcZ115HNA03KJEgBBPUc97Hmr2G8xsY0DMt_9JULA13Jktg0pdFwfjsnP4FCJyWVCnHJ6zfHXSVqSKWwiGdPg8AxVtvvc8KXmmzPfs-agj2xreKyAQoyyajPFmGg83zgmN35EQ6BAkRcp6sA2K1kwoeIjSGpbdyQHfHn1jRz5jbN-rxOFzF8JdJMJDMA14AFvSnOkElFmNBRn4hSR-QLO77zV_uak");'></div>
</div>
</div>
</div>
<!-- Right: Product Info -->
<div class="lg:col-span-5 flex flex-col justify-start">
<div class="mb-2">
<span class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest rounded-full">Sweets &amp; Delicacies</span>
</div>
<h1 class="text-4xl font-bold mb-4 leading-tight tracking-tight">Handcrafted Chaku Yomari</h1>
<div class="flex items-center gap-4 mb-6">
<div class="flex text-mustard">
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined text-gray-300">star</span>
</div>
<span class="text-sm font-medium text-gray-500">(48 Reviews)</span>
<span class="h-4 w-px bg-gray-300"></span>
<span class="text-sm font-bold text-green-600 flex items-center gap-1">
<span class="material-symbols-outlined text-sm">check_circle</span> In Stock
                    </span>
</div>
<div class="text-3xl font-bold text-primary mb-8">$4.50 <span class="text-lg text-gray-400 font-normal line-through ml-2">$5.99</span></div>
<div class="prose prose-sm dark:prose-invert text-gray-600 dark:text-gray-400 mb-8">
<p class="leading-relaxed">
                        Indulge in the authentic taste of the Kathmandu Valley. Our Yomari is meticulously handcrafted using fine rice flour dough, steamed to perfection, and filled with a rich, molten center of traditional <strong>Chaku (molasses)</strong> and roasted sesame seeds. 
                    </p>
<ul class="mt-4 space-y-2">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs text-primary">circle</span> 100% Traditional Recipe</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs text-primary">circle</span> Steamed fresh on order</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs text-primary">circle</span> Locally sourced ingredients</li>
</ul>
</div>
<!-- Action Block -->
<div class="p-6 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 custom-shadow mb-8">
<div class="flex flex-col gap-4">
<div class="flex items-center justify-between mb-2">
<span class="text-sm font-bold">Quantity</span>
<div class="flex items-center bg-gray-100 dark:bg-gray-700 rounded-lg p-1">
<button class="w-8 h-8 flex items-center justify-center hover:bg-white dark:hover:bg-gray-600 rounded transition-colors">
<span class="material-symbols-outlined text-lg">remove</span>
</button>
<span class="w-12 text-center font-bold">1</span>
<button class="w-8 h-8 flex items-center justify-center hover:bg-white dark:hover:bg-gray-600 rounded transition-colors">
<span class="material-symbols-outlined text-lg">add</span>
</button>
</div>
</div>
<button class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 rounded-xl transition-all active:scale-95 flex items-center justify-center gap-2">
<span class="material-symbols-outlined">shopping_cart</span>
                            Add to Cart
                        </button>
<button class="w-full border-2 border-gray-100 dark:border-gray-700 font-bold py-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            Buy Now
                        </button>
</div>
</div>
<div class="flex items-center gap-6 text-sm font-medium text-gray-500">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary">timer</span>
                        Prep: 20 mins
                    </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary">local_shipping</span>
                        Standard Delivery
                    </div>
</div>
</div>
</div>
<!-- Customer Reviews -->
<section class="mb-20">
<div class="flex items-center justify-between mb-8">
<h2 class="text-2xl font-bold">Customer Reviews</h2>
<button class="text-primary font-bold flex items-center gap-1 hover:underline">
                    Write a review <span class="material-symbols-outlined text-sm">edit</span>
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Review 1 -->
<div class="p-6 bg-white dark:bg-gray-800 rounded-2xl border border-gray-50 dark:border-gray-700">
<div class="flex items-center justify-between mb-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-gray-200" data-alt="User avatar placeholder" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB8LUqDjqDeHV7C1iDNK2xTTo9WkN8-JfOCv95xU9xk4gy9WETo9NT_SO7pB6zRRYqUqMQwyQefVwEJO5frwMpUhGMOPJtCWcAuhP2E5XXStwpEo5dsOWL7QwnkY8PMF656Xe3rBwjKEn2cqLw5NyW8OQ2KdNcZ2Fb9cW-aB6XvXNPFWxxKVeb9Lm5MWM4h86v80E8KdPilmePzLEidUlwQXIqh3J2nfh4KxDbMuxAzDqCc_WHBbbvfUSIUBf6_YS3VIHsytufMMVo"); background-size: cover;'></div>
<div>
<p class="font-bold text-sm">Prajwal M.</p>
<p class="text-[10px] text-gray-400">Verified Buyer • 2 days ago</p>
</div>
</div>
<div class="flex text-mustard scale-75">
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
</div>
</div>
<p class="text-sm text-gray-600 dark:text-gray-400 italic">"The chaku filling was perfectly gooey and warm. Tastes exactly like home! Will definitely order again."</p>
</div>
<!-- Review 2 -->
<div class="p-6 bg-white dark:bg-gray-800 rounded-2xl border border-gray-50 dark:border-gray-700">
<div class="flex items-center justify-between mb-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-gray-200" data-alt="User avatar placeholder" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBBgTT4_zhLaJGa45gI5UhetFmKYU1V7-iujyqH5NTN3FEPGDAAB1jj-_YrNHkiNKwUNYQ_WrHjafwIEnSvqSygsduc8MVylDjYX5pvTno4fxci3RncLvfjhEPVGHHrIGUnQ_M_ymRWjFnhQXDje7JIAcTlSTu-bcIx2GOMX33UzhBV-HArtFmYELjhyVNDMUq052heIdWzZkceJM2Mu0cgZ8sEVAF9gQNG_WD8UsDEADpUHSs3TqiwC8mTsu51S5tVse-1MQOZfBQ"); background-size: cover;'></div>
<div>
<p class="font-bold text-sm">Sunita K.</p>
<p class="text-[10px] text-gray-400">Verified Buyer • 1 week ago</p>
</div>
</div>
<div class="flex text-mustard scale-75">
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined fill-1">star</span>
<span class="material-symbols-outlined text-gray-300">star</span>
</div>
</div>
<p class="text-sm text-gray-600 dark:text-gray-400 italic">"The dough was soft and the shape was authentic. Fast delivery too!"</p>
</div>
</div>
</section>
<!-- Related Products -->
<section class="pb-20">
<h2 class="text-2xl font-bold mb-8">You might also like</h2>
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
<!-- Product 1 -->
<div class="group cursor-pointer">
<div class="aspect-square bg-white dark:bg-gray-800 rounded-2xl overflow-hidden mb-4 custom-shadow">
<div class="w-full h-full bg-center bg-no-repeat bg-cover group-hover:scale-110 transition-transform duration-500" data-alt="Traditional Khuwa Yomari with milk solids filling" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB36ZhOJsQu1np5JVXJL7m2idVZQi4hWdsHvgJ_4HVG4NxonxPaBLE7qqH3G4WiZjZaEm6XGvAyXeJr73QyknrMFU9ITtZFqWiyn6p6CPqz2KHH7i_gT6_H5m-14UOEOIn77WchPBKdajDwg7N5m93rqeuwptshpEUQ3oZsOFWZ9UD-D3GAefIuSS-FK54p3oJpwLgluj-OrhsiqctKiO2eD9JE4J7LDW_UosrV3Tw8DswIVXBVerFz3wJsTf5cCKvVCTP3fVutUuQ");'>
</div>
</div>
<h3 class="font-bold text-sm group-hover:text-primary transition-colors">Khuwa Yomari</h3>
<p class="text-primary font-bold">$4.99</p>
</div>
<!-- Product 2 -->
<div class="group cursor-pointer">
<div class="aspect-square bg-white dark:bg-gray-800 rounded-2xl overflow-hidden mb-4 custom-shadow">
<div class="w-full h-full bg-center bg-no-repeat bg-cover group-hover:scale-110 transition-transform duration-500" data-alt="Crispy Lakhamari traditional sweet" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBLA6xmsYOnobOhM072jN-g4T27UHbf-440RY0ZjFBqNt2ujrQ1g-s8_tV_Y8VnMjhLY2ITKM4C5SRzImwL7V8Tq9Zr2Ui8g1HVFH9BYnDBmZXimt2WlDt2rkJ4ghvTeWDuLrQPxD1haQiI-5Ev5W6CgEtjipLOeKuPCnubH6A-ENrphPmB5JPrd3O8kUuqTulA3Rj10H2VJihyB25ze_srwtylq3fqfd6nMttJ6HPaW6LpWElLEvX34uzpLIoiGB3PvW8Dl_OLAM0");'>
</div>
</div>
<h3 class="font-bold text-sm group-hover:text-primary transition-colors">Lakhamari</h3>
<p class="text-primary font-bold">$3.50</p>
</div>
<!-- Product 3 -->
<div class="group cursor-pointer">
<div class="aspect-square bg-white dark:bg-gray-800 rounded-2xl overflow-hidden mb-4 custom-shadow">
<div class="w-full h-full bg-center bg-no-repeat bg-cover group-hover:scale-110 transition-transform duration-500" data-alt="Barfi assorted Nepalese sweets box" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDwSFNtBu0HtMWK95XHjaZ0b_kBQvEmgVR1rBNs9x5lqz15QtyaMUprfY3unp1QhIE_MDkV7R5fF4VCovHNHu2RTNP5nLj7JqNt_NrHTSMipuI9op4L_VVcSyOQadzRbrN_sG6XH5H9vmgHgsnsiX3DmvzFl2knvdtsQpRYDYXyPiOiiz3pxvQ3EaGSe7wY6kX0QVhf1ubaac_rAD6RvSBHJkK4p6_fQgwtd8eJkMuM8ugTIyPwcSai8MlMTTgwK6KR5nkzewYLsoo");'>
</div>
</div>
<h3 class="font-bold text-sm group-hover:text-primary transition-colors">Assorted Sweets Box</h3>
<p class="text-primary font-bold">$12.00</p>
</div>
<!-- Product 4 -->
<div class="group cursor-pointer">
<div class="aspect-square bg-white dark:bg-gray-800 rounded-2xl overflow-hidden mb-4 custom-shadow">
<div class="w-full h-full bg-center bg-no-repeat bg-cover group-hover:scale-110 transition-transform duration-500" data-alt="Traditional Sel Roti rice donuts" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCSRLXTjxHljOv-0ftut5Ke-C-8MiQL-l13omALeN_OMINWREG6S5-DPCqNmm2Tw08fJgP6iGBaeDPtZDHig9AingW3gt7T3kW4PG5LRv9f_2njJ2sWFbW0kbNQEH36HabQ71f5JxfUr_3lQtMumI7sy9Lgsb0o858P0D36CYvZv7Ba_nZPpYBHUPBWgvvq-k1tStDHjJsTaY4Bf6KSOMsAlT0nJNTMf00UXVtDqhjlY_pkPb2FbM_PFpGEMRwCr3tWPBhXDIe9Ajk");'>
</div>
</div>
<h3 class="font-bold text-sm group-hover:text-primary transition-colors">Sel Roti (Set of 5)</h3>
<p class="text-primary font-bold">$5.50</p>
</div>
</div>
</section>
</main>
<footer class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 py-12">
<div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-2 text-primary mb-6">
<span class="material-symbols-outlined text-2xl font-bold">restaurant_menu</span>
<h2 class="text-xl font-bold tracking-tight text-[#161213] dark:text-white">Foodify</h2>
</div>
<p class="text-sm text-gray-500 leading-relaxed">Bringing the authentic flavors of Newari heritage to your doorstep since 2023.</p>
</div>
<div>
<h4 class="font-bold mb-6">Shop</h4>
<ul class="space-y-4 text-sm text-gray-500">
<li><a class="hover:text-primary" href="#">All Menu</a></li>
<li><a class="hover:text-primary" href="#">Sweets</a></li>
<li><a class="hover:text-primary" href="#">Savory</a></li>
<li><a class="hover:text-primary" href="#">New arrivals</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Support</h4>
<ul class="space-y-4 text-sm text-gray-500">
<li><a class="hover:text-primary" href="#">Shipping Policy</a></li>
<li><a class="hover:text-primary" href="#">Refund Policy</a></li>
<li><a class="hover:text-primary" href="#">FAQ</a></li>
<li><a class="hover:text-primary" href="#">Contact Us</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Newsletter</h4>
<div class="flex gap-2">
<input class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-800 border-none rounded-lg text-sm focus:ring-1 focus:ring-primary" placeholder="Email" type="email"/>
<button class="bg-primary text-white p-2 rounded-lg">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="max-w-[1200px] mx-auto px-6 mt-12 pt-8 border-t border-gray-100 dark:border-gray-800 text-center text-[10px] text-gray-400 uppercase tracking-widest">
            © 2024 Foodify - Handcrafted with Love in Kathmandu
        </div>
</footer>
</body>
<?php include("includes/footer.php"); ?>

</html>
