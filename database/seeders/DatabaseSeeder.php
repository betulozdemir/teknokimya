<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Feature;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@teknokimya.com'],
            [
                'name' => 'Teknokimya Admin',
                'password' => Hash::make('password'),
            ]
        );

        $menuItems = [
            [
                'title' => 'Ana Sayfa',
                'url' => '/',
                'target' => '_self',
                'sort_order' => 1,
                'is_active' => true,
                'translations' => [
                    'en' => ['title' => 'Home', 'url' => '/'],
                    'ar' => ['title' => 'الرئيسية', 'url' => '/'],
                ],
            ],
            [
                'title' => 'Hakkımızda',
                'url' => '/hakkimizda',
                'target' => '_self',
                'sort_order' => 2,
                'is_active' => true,
                'translations' => [
                    'en' => ['title' => 'About Us', 'url' => '/about'],
                    'ar' => ['title' => 'من نحن', 'url' => '/من-نحن'],
                ],
            ],
            [
                'title' => 'Hizmetlerimiz',
                'url' => '/hizmetlerimiz',
                'target' => '_self',
                'sort_order' => 3,
                'is_active' => true,
                'translations' => [
                    'en' => ['title' => 'Services', 'url' => '/services'],
                    'ar' => ['title' => 'خدماتنا', 'url' => '/خدماتنا'],
                ],
            ],
            [
                'title' => 'Ürünler',
                'url' => '/urunler',
                'target' => '_self',
                'sort_order' => 4,
                'is_active' => true,
                'translations' => [
                    'en' => ['title' => 'Products', 'url' => '/products'],
                    'ar' => ['title' => 'منتجاتنا', 'url' => '/منتجاتنا'],
                ],
            ],
            [
                'title' => 'Blog',
                'url' => '/#blog',
                'target' => '_self',
                'sort_order' => 5,
                'is_active' => true,
                'translations' => [
                    'en' => ['title' => 'Blog', 'url' => '/#blog'],
                    'ar' => ['title' => 'المدونة', 'url' => '/#المدونة'],
                ],
            ],
            [
                'title' => 'İletişim',
                'url' => '/iletisim',
                'target' => '_self',
                'sort_order' => 6,
                'is_active' => true,
                'translations' => [
                    'en' => ['title' => 'Contact', 'url' => '/contact'],
                    'ar' => ['title' => 'اتصل بنا', 'url' => '/اتصل-بنا'],
                ],
            ],
        ];

        foreach ($menuItems as $menuItem) {
            MenuItem::updateOrCreate(
                ['sort_order' => $menuItem['sort_order']],
                $menuItem
            );
        }

        if (Slider::query()->count() === 0) {
            Slider::create([
                'subtitle' => 'Teknokimya Endüstriyel Çözümler',
                'title' => 'Yüksek Performanslı',
                'highlight_text' => 'Galvano Kimyasalları',
                'description' => 'Bakır, nikel, krom, çinko kaplama banyoları ve yüzey işlem proseslerinde 30 yılı aşkın tecrübe ile uluslararası standartlarda güvenilir kimyasallar üretiyoruz.',
                'button_text' => 'Ürünleri İnceleyin - Keşfedin - ',
                'button_url' => '/products',
                'background_image' => 'assets/images/slider/slider-galvano-coating.jpg',
                'sort_order' => 1,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'subtitle' => 'Teknokimya Industrial Solutions',
                        'title' => 'High Performance',
                        'highlight_text' => 'Electroplating Chemicals',
                        'description' => 'Manufacturing reliable industrial chemicals for copper, nickel, chrome, and zinc plating baths with over 30 years of surface finishing excellence.',
                        'button_text' => 'Explore Products - Explore More - ',
                    ],
                    'ar' => [
                        'subtitle' => 'تكنوكيميا للحلول الصناعية',
                        'title' => 'عالية الأداء',
                        'highlight_text' => 'كيماويات الجلفانو والطلاء',
                        'description' => 'تصنيع كيماويات صناعية معتمدة لأحواض طلاء النحاس والنيكل والكروم والزنك مع أكثر من 30 عاماً من الخبرة.',
                        'button_text' => 'استكشف المنتجات - اكتشف المزيد - ',
                    ],
                ],
            ]);

            Slider::create([
                'subtitle' => 'Ar-Ge & Kalite Kontrol Altyapısı',
                'title' => 'Modern Laboratuvar &',
                'highlight_text' => 'Banyo Analizleri',
                'description' => 'Gelişmiş analitik laboratuvarımızda periyodik banyo analizleri, Hull Cell testleri ve özel formülasyon geliştirme desteği ile üretiminizde sıfır hata hedefliyoruz.',
                'button_text' => 'Hizmetleri İnceleyin - Keşfedin - ',
                'button_url' => '/services',
                'background_image' => 'assets/images/slider/slider-chemistry-lab.jpg',
                'sort_order' => 2,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'subtitle' => 'R&D & Quality Control Lab',
                        'title' => 'Advanced Laboratory &',
                        'highlight_text' => 'Bath Analysis',
                        'description' => 'Achieving zero-defect production with periodic bath analysis, Hull Cell tests, and custom chemical formulations in our state-of-the-art laboratory.',
                        'button_text' => 'Our Services - Explore More - ',
                    ],
                    'ar' => [
                        'subtitle' => 'مختبر البحث والتطوير وضبط الجودة',
                        'title' => 'مختبر متطور و',
                        'highlight_text' => 'تحاليل الأحواض الكيميائية',
                        'description' => 'تحقيق أعلى معايير الجودة مع تحاليل الأحواض الدورية واختبارات هول سيل والدعم الفني الميداني المستمر.',
                        'button_text' => 'خدماتنا - اكتشف المزيد - ',
                    ],
                ],
            ]);
        }

        if (Feature::query()->count() === 0) {
            $features = [
                [
                    'title' => 'Worldwide Manufacturing',
                    'description' => "Industry's standard dummy text ever since the when an printer took a galley of type and scrambled",
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'Best Quality Service',
                    'description' => 'The point of using Lorem Ipsum is that it has a more-or less normal distribution of letters',
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'title' => 'Experienced Workers',
                    'description' => 'Literature from 45 BC, making it over 2000 years old. Latin professor at Hampden-Sydney College in Virginia',
                    'sort_order' => 3,
                    'is_active' => true,
                ],
            ];

            foreach ($features as $feature) {
                Feature::create($feature);
            }
        }

        $services = [
            [
                'title' => 'Metal Yüzey İşlem Kimyasalları',
                'description' => 'Endüstriyel üretim hatları için yüksek performanslı yağ alma, aşındırma ve pasivasyon çözümleri.',
                'image' => 'assets/images/services/services-thumb-08.png',
                'url' => '/iletisim',
                'sort_order' => 1,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Metal Surface Treatment Chemicals',
                        'description' => 'High-performance degreasing, pickling, and passivation solutions for industrial lines.',
                    ],
                    'ar' => [
                        'title' => 'كيماويات معالجة الأسطح المعدنية',
                        'description' => 'حلول عالية الأداء لإزالة الشحوم والتخليل والتخميل لخطوط الإنتاج الصناعية.',
                    ],
                ],
            ],
            [
                'title' => 'Fosfat Kaplama Çözümleri',
                'description' => 'Demir, çinko ve mangan fosfat kaplama prosesleri ile korozyon direnci ve boya altı hazırlık.',
                'image' => 'assets/images/services/services-thumb-09.png',
                'url' => '/iletisim',
                'sort_order' => 2,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Phosphate Coating Solutions',
                        'description' => 'Corrosion resistance and pre-paint preparation with iron, zinc, and manganese phosphate coatings.',
                    ],
                    'ar' => [
                        'title' => 'حلول طلاء الفوسفات',
                        'description' => 'مقاومة التآكل والتحضير قبل الطلاء بعمليات طلاء فوسفات الحديد والزنك والمنغنيز.',
                    ],
                ],
            ],
            [
                'title' => 'Alüminyum Yüzey İşlem & Eloksal',
                'description' => 'Alüminyum profiller ve parçalar için kromatsız pasivasyon, eloksal ve yüzey temizleme kimyasalları.',
                'image' => 'assets/images/services/services-thumb-14.png',
                'url' => '/iletisim',
                'sort_order' => 3,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Aluminum Surface Treatment & Anodizing',
                        'description' => 'Chromate-free passivation, anodizing, and surface cleaning chemicals for aluminum parts.',
                    ],
                    'ar' => [
                        'title' => 'معالجة أسطح الألمنيوم والأنودة',
                        'description' => 'كيماويات التخميل الخالية من الكرومات والأنودة وتنظيف الأسطح لقطاعات الألمنيوم.',
                    ],
                ],
            ],
            [
                'title' => 'Ar-Ge & Laboratuvar Analiz Hizmeti',
                'description' => 'Gelişmiş laboratuvar cihazlarımızla banyo analizleri, tuz testi ve özel formülasyon geliştirme.',
                'image' => 'assets/images/services/services-thumb-15.png',
                'url' => '/iletisim',
                'sort_order' => 4,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'R&D & Laboratory Analysis Service',
                        'description' => 'Bath analysis, salt spray testing, and custom formulation development in our advanced laboratory.',
                    ],
                    'ar' => [
                        'title' => 'خدمات البحث والتطوير والتحليل المخبري',
                        'description' => 'تحليلات الأحواض واختبار رش الملح وتطوير التركيبات المخصصة بأحدث الأجهزة المخبرية.',
                    ],
                ],
            ],
            [
                'title' => 'Korozyon Önleyici Koruyucu Yağlar',
                'description' => 'Metal parçaların depolama ve sevkiyat sürecinde paslanmasını önleyen uzun ömürlü koruyucular.',
                'image' => 'assets/images/services/services-thumb-16.png',
                'url' => '/iletisim',
                'sort_order' => 5,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Anti-Corrosion Protective Oils',
                        'description' => 'Long-lasting protective oils preventing rust on metal parts during storage and shipment.',
                    ],
                    'ar' => [
                        'title' => 'زيوت الحماية المضادة للتآكل',
                        'description' => 'واقيات طويلة الأمد تمنع صدأ الأجزاء المعدنية أثناء التخزين والشحن.',
                    ],
                ],
            ],
            [
                'title' => 'Boya Sökücü & Temizlik Kimyasalları',
                'description' => 'Askı aparatları ve hatalı boyanmış parçalar için hızlı ve güvenli endüstriyel boya sökücüler.',
                'image' => 'assets/images/services/services-thumb-31.png',
                'url' => '/iletisim',
                'sort_order' => 6,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Paint Strippers & Cleaning Chemicals',
                        'description' => 'Fast and safe industrial paint strippers for hangers andcoated metal components.',
                    ],
                    'ar' => [
                        'title' => 'مزيلات الطلاء وكيماويات التنظيف',
                        'description' => 'مزيلات طلاء صناعية سريعة وآمنة للعلاقات والقطع المعدنية المطلية.',
                    ],
                ],
            ],
            [
                'title' => 'Atık Su & Proses Kimyasalları',
                'description' => 'Kaplama tesisleri için koagülant, flokülant ve köpük kesici su şartlandırma çözümleri.',
                'image' => 'assets/images/services/services-thumb-32.png',
                'url' => '/iletisim',
                'sort_order' => 7,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'Wastewater & Process Chemicals',
                        'description' => 'Coagulant, flocculant, and defoamer water treatment solutions for coating facilities.',
                    ],
                    'ar' => [
                        'title' => 'كيماويات معالجة المياه والعمليات',
                        'description' => 'حلول معالجة المياه والمخثرات ومضادات الرغوة لمنشآت الطلاء الصناعي.',
                    ],
                ],
            ],
            [
                'title' => 'Yerinde Teknik Destek & Banyo Kurulumu',
                'description' => 'Uzman mühendis kadromuzla yerinde proses kurulumu, periyodik kontrol ve personel eğitimi.',
                'image' => 'assets/images/services/services-thumb-33.png',
                'url' => '/iletisim',
                'sort_order' => 8,
                'is_active' => true,
                'translations' => [
                    'en' => [
                        'title' => 'On-Site Technical Support & Bath Setup',
                        'description' => 'On-site process installation, periodic bath control, and operator training by our engineers.',
                    ],
                    'ar' => [
                        'title' => 'الدعم الفني الميداني وإعداد الأحواض',
                        'description' => 'تركيب العمليات ميدانياً والمراقبة الدورية وتدريب الكوادر من قبل مهندسينا الخبراء.',
                    ],
                ],
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['sort_order' => $service['sort_order']],
                $service
            );
        }

        $products = [
            [
                'title' => 'Temel Kimyasallar',
                'category' => 'Ürünlerimiz',
                'description' => 'Kaplama banyoları ve proseslerinde kullanılan yüksek saflıkta inorganik tuzlar ve ana hammaddeler.',
                'image' => 'assets/images/portfolio/portfolio-thumb-45.png',
                'is_featured' => false,
                'sort_order' => 1,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Kaplama Banyosu Hammaddeleri & Tuzlar',
                        'items' => [
                            ['code' => 'Nikel Sülfat', 'description' => 'Galvano nikel kaplama banyolarında temel nikel iyon kaynağı olarak kullanılan yüksek saflıkta kristal tuz.'],
                            ['code' => 'Nikel Klorür', 'description' => 'Anot erimesini ve banyo iletkenliğini artıran yüksek saflıkta galvano tuzu.'],
                            ['code' => 'Kromik Asit', 'description' => 'Dekoratif ve sert krom kaplama banyolarında kullanılan pul (flake) formda yüksek saflıkta krom trioksit.'],
                            ['code' => 'Bakır Siyanür', 'description' => 'Siyanürlü bakır kaplama ve pirinç kaplama banyolarında ana bakır kaynağı.'],
                            ['code' => 'Sodyum / Potasyum Siyanür', 'description' => 'Siyanürlü bakır, çinko ve pirinç banyolarında serbest siyanür dengesini sağlayan baz tuz.'],
                            ['code' => 'Çinko Oksit & Çinko Sülfat', 'description' => 'Alkali siyanürsüz ve asitli çinko kaplama banyolarında çinko kaynağı olarak kullanılan kaliteli bileşikler.'],
                            ['code' => 'Asit Borik', 'description' => 'Nikel ve asitli çinko banyolarında pH tamponlayıcı (buffer) olarak görev yapan saf kristal ürün.'],
                            ['code' => 'Kalay Sülfat', 'description' => 'Asitli kalay kaplama banyolarında metal kaynağı olarak kullanılan kaliteli tuz.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => [
                        'title' => 'Basic Chemicals',
                        'category' => 'Our Products',
                        'description' => 'High purity inorganic salts and raw materials used in electroplating baths and processes.',
                        'process_groups' => [
                            [
                                'title' => 'Plating Bath Raw Materials & Salts',
                                'items' => [
                                    ['code' => 'Nickel Sulfate', 'description' => 'High purity crystalline salt used as the main nickel ion source in nickel plating baths.'],
                                    ['code' => 'Nickel Chloride', 'description' => 'High purity salt that improves anode dissolution and bath electrical conductivity.'],
                                    ['code' => 'Chromic Acid', 'description' => 'High purity flake form chromium trioxide used in decorative and hard chrome plating baths.'],
                                    ['code' => 'Copper Cyanide', 'description' => 'Primary copper source in cyanide copper and brass plating baths.'],
                                    ['code' => 'Sodium / Potassium Cyanide', 'description' => 'Base salt providing free cyanide balance in cyanide copper, zinc, and brass baths.'],
                                    ['code' => 'Zinc Oxide & Zinc Sulfate', 'description' => 'Zinc source compounds used in alkaline non-cyanide and acid zinc plating baths.'],
                                    ['code' => 'Boric Acid', 'description' => 'Pure buffering agent maintaining pH balance in nickel and acid zinc baths.'],
                                    ['code' => 'Tin Sulfate', 'description' => 'Quality metal source salt used in acid tin plating baths.'],
                                ],
                            ],
                        ],
                    ],
                    'ar' => [
                        'title' => 'الكيماويات الأساسية',
                        'category' => 'منتجاتنا',
                        'description' => 'الأملاح والمواد الخام عالية النقاء المستخدمة في أحواض وعمليات الطلاء الكهربائي.',
                    ],
                ],
            ],
            [
                'title' => 'Ön İşlemler',
                'category' => 'Ürünlerimiz',
                'description' => 'Metal yüzeylerin kaplamaya mükemmel şekilde hazırlanmasını sağlayan sıcak, ultrasonik, elektrikli yağ alma ve asitli aktivasyon kimyasalları.',
                'image' => 'assets/images/portfolio/portfolio-thumb-44.png',
                'is_featured' => false,
                'sort_order' => 2,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Sıcak ve Ultrasonik Yağ Alma Prosesleri',
                        'items' => [
                            ['code' => 'TK050', 'description' => 'Demir ve alaşımlarının temizlenmesinde sıcak veya ultrasonik olarak kullanılan, yüksek yağ çözme kapasiteli yağ alma tuzu.'],
                            ['code' => 'TK052', 'description' => 'Silikat ve fosfat içermeyen, tüm metallere uygun, polisaj pastalarını temizlemede etkili ve geçici korozyon direnci sağlayan sıvı yağ alma malzemesi.'],
                        ],
                    ],
                    [
                        'title' => 'Elektrikli Yağ Alma Prosesleri',
                        'items' => [
                            ['code' => 'TK053', 'description' => 'Demir ve alaşımları için yüksek alkali, siyanürsüz, köpürmeyen; anodik/katodik ve oda sıcaklığında kullanılabilen elektrikli yağ alma tuzu.'],
                            ['code' => 'TK054', 'description' => 'Alüminyum harici metaller için fosfatsız, oda sıcaklığında çalışan anodik/katodik elektrikli yağ alma tuzu.'],
                            ['code' => 'TK055', 'description' => 'Demir, zamak, pirinç, alüminyum ve bakır alaşımları için üniversal elektrikli yağ alma sistemi.'],
                        ],
                    ],
                    [
                        'title' => 'Asitli Ön İşlem Prosesleri',
                        'items' => [
                            ['code' => 'TK695', 'description' => 'Florür tuzları ve yüzey aktifler içeren, kaplama öncesi mükemmel yapışma sağlayan kuru asit tuzu (mineral asit dekapaj alternatifi).'],
                            ['code' => 'TK696', 'description' => 'Siyanürlü veya asitli bakır kaplama aktivasyonunda, sonraki nikel vb. kaplamalar için ideal yapışma zemini oluşturan aktivatör.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => [
                        'title' => 'Pre-Treatments',
                        'category' => 'Our Products',
                        'description' => 'Hot, ultrasonic, electrolytic degreasing, and acid activation chemicals ensuring perfect surface preparation before plating.',
                    ],
                    'ar' => [
                        'title' => 'المعالجة الأولية',
                        'category' => 'منتجاتنا',
                        'description' => 'كيماويات إزالة الشحوم والتنشيط الحمضي لتحضير الأسطح المعدنية.',
                    ],
                ],
            ],
            [
                'title' => 'Bakır Kaplamalar',
                'category' => 'Ürünlerimiz',
                'description' => 'Siyanürlü, asitli ve alkali bakır kaplama prosesleri; yüksek parlaklık, mükemmel örtücülük ve üstün tesviye kabiliyeti sunar.',
                'image' => 'assets/images/portfolio/copper-plating-process.jpg',
                'is_featured' => true,
                'sort_order' => 3,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Siyanürlü Bakır Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK200 SBP', 'description' => 'Potasyum ve sodyum bazlı uygulamalarda kullanılan siyanürlü bakır kaplama prosesidir. Yüksek parlaklığa sahiptir. Benzeri proseslere göre daha yüksek akım yoğunlukları uygulanabilir.'],
                            ['code' => 'TK201 SBT', 'description' => 'Potasyum ve sodyum bazlı uygulamalarda kullanılan siyanürlü bakır kaplama prosesidir. Yüksek girişkenlik ve koku kesme özelliğine sahiptir. Benzeri proseslere göre daha yüksek akım yoğunlukları uygulanabilir.'],
                        ],
                    ],
                    [
                        'title' => 'Asitli Bakır Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK300 ABP', 'description' => 'Yüksek parlaklık, örtücülük ve girişkenliğe sahip, stabil bir asitli bakır prosesidir. Askı uygulamaları dışında dolap kaplamalarda da kullanılabilir. Sıcaklığa toleransı yüksek bir parlatıcıdır. ( 20 – 40oC )'],
                            ['code' => 'TK301 ABK', 'description' => 'Düzgün yüzey sağlamı, yüksek girişkenlik, dolgun bir parlaklık için kullanılan stabil bir bakır prosesinde kullanılan asit bakır kurutucu.'],
                            ['code' => 'TK302 ABT', 'description' => 'Stabil asitli bakır prosesinde kullanılan taşıyıcı bileşen.'],
                        ],
                    ],
                    [
                        'title' => 'Alkali Bakır Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK250', 'description' => 'Siyanür içermeyen; alüminyum dışındaki tüm metaller üzerine uygulanabilen, yüksek girişkenlik ve yüksek mikron kaplama kabiliyetine sahip proses.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => [
                        'title' => 'Copper Plating',
                        'category' => 'Our Products',
                        'description' => 'Cyanide, acid, and alkaline copper plating processes delivering exceptional brightness, coverage, and leveling.',
                        'process_groups' => [
                            [
                                'title' => 'Cyanide Copper Plating Processes',
                                'items' => [
                                    ['code' => 'TK200 SBP', 'description' => 'Cyanide copper plating process for potassium and sodium based applications. High brightness and high current density capacity.'],
                                    ['code' => 'TK201 SBT', 'description' => 'Potassium and sodium based cyanide copper process with high throwing power and odor suppression.'],
                                ],
                            ],
                            [
                                'title' => 'Acid Copper Plating Processes',
                                'items' => [
                                    ['code' => 'TK300 ABP', 'description' => 'High gloss, excellent leveling and throwing power stable acid copper process for rack and barrel lines (20-40°C).'],
                                    ['code' => 'TK301 ABK', 'description' => 'Acid copper brightener component ensuring smooth surface, depth of gloss, and high penetration.'],
                                    ['code' => 'TK302 ABT', 'description' => 'Carrier component for stable acid copper plating bath systems.'],
                                ],
                            ],
                            [
                                'title' => 'Alkaline Copper Plating Processes',
                                'items' => [
                                    ['code' => 'TK250', 'description' => 'Cyanide-free process applicable to all metals except aluminum, offering high penetration and heavy deposit capability.'],
                                ],
                            ],
                        ],
                    ],
                    'ar' => [
                        'title' => 'طلاء النحاس',
                        'category' => 'منتجاتنا',
                        'description' => 'عمليات طلاء النحاس بالسيانيد والحمضي والقلوي لتوفير لمعان استثنائي وتغطية فائقة.',
                    ],
                ],
            ],
            [
                'title' => 'Nikel Kaplamalar',
                'category' => 'Ürünlerimiz',
                'description' => 'Parlak, yarı parlak, saten ve siyah nikel prosesleri; dekoratif ve teknik kaplamalarda maksimum parlaklık ve korozyon direnci.',
                'image' => 'assets/images/portfolio/portfolio-thumb-41.png',
                'is_featured' => false,
                'sort_order' => 4,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Parlak Nikel Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK5301', 'description' => 'Dekoratif amaçlı, yüksek parlaklık ve agresif parlatma özelliği sunan dolap kaplama parlatıcısı. Oldukça beyaz ve yumuşak kaplama tabakaları sağlar.'],
                            ['code' => 'TK5301-YK', 'description' => 'Dolap kaplamaları için homojen kalınlık dağılımı ve yüksek çizgi örtücülük sağlayan özel parlatıcı.'],
                            ['code' => 'TK5201-NP', 'description' => 'Düşük tüketimli, yüksek parlaklık, askı uygulamalarına uygun ve krom kaplama için yüzeyi aktif hale getiren parlatıcı prosesi.'],
                            ['code' => 'TK5202', 'description' => 'Nikel kaplamalarda kırılganlıkları önleyen, yüksek girişkenlik, dolgunluk ve esneklik sağlayan taşıyıcı katkı.'],
                            ['code' => 'TK5205', 'description' => 'Çinko, demir ve bakır kirliliklerini bertaraf ederek yüksek girişkenlik sağlayan arındırıcı ve saflandırıcı.'],
                        ],
                    ],
                    [
                        'title' => 'Yarı Parlak Kükürtsüz Nikel Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK5100', 'description' => 'Çift katlı (duplex) nikel kaplamalarda korozyon direncini artıran, mükemmel süneklik ve hat örtücülüğüne sahip kükürtsüz nikel prosesi.'],
                        ],
                    ],
                    [
                        'title' => 'Saten Nikel Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK5210', 'description' => 'Dekoratif, homojen ipeksi mat ve inci taneli görünüm sağlayan askı tipi saten nikel sistemi.'],
                            ['code' => 'TK5211', 'description' => 'Saten nikel banyolarında matlık seviyesini ayarlayan ve stabilitesini koruyan regülatör katkı.'],
                        ],
                    ],
                    [
                        'title' => 'Siyah / Füme Nikel Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK5400', 'description' => 'Zayıf alkali veya hafif asidik elektrolitlerle dekoratif, homojen antrasit ve siyah kaplama tabakaları oluşturan nikel prosesi.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Nickel Plating', 'category' => 'Our Products', 'description' => 'Bright, semi-bright, satin, and black nickel plating processes offering maximum aesthetics.'],
                    'ar' => ['title' => 'طلاء النيكل', 'category' => 'منتجاتنا', 'description' => 'عمليات طلاء النيكل اللامع وشبه اللامع والساتان والأسود.'],
                ],
            ],
            [
                'title' => 'Krom Kaplamalar',
                'category' => 'Ürünlerimiz',
                'description' => 'Dekoratif ve sert krom kaplama prosesleri; yüksek aşınma direnci, parlaklık ve florürsüz çevre dostu elektrolitler.',
                'image' => 'assets/images/portfolio/portfolio-thumb-42.png',
                'is_featured' => false,
                'sort_order' => 5,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Dekoratif Krom Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK401', 'description' => 'Yüksek örtücülük ve mavimsi parlaklık sağlayan dekoratif krom kaplama katalizör sistemi.'],
                            ['code' => 'TK401-K', 'description' => 'Krom banyosunda klorür kirliliğini gideren ve akım randımanını optimize eden yardımcı tuz.'],
                        ],
                    ],
                    [
                        'title' => 'Sert Krom Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK402', 'description' => 'Florür içermeyen, yüksek verimli (%24-26 katodik verim) ve 1000-1150 HV sertlik sağlayan aşınma dirençli sert krom elektroliti.'],
                            ['code' => 'TK403', 'description' => 'Sert krom banyolarında duman ve köpük oluşumunu engelleyen çevre dostu sıvı buğu kesici katkı.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Chrome Plating', 'category' => 'Our Products', 'description' => 'Decorative and hard chrome plating processes with high wear resistance.'],
                    'ar' => ['title' => 'طلاء الكروم', 'category' => 'منتجاتنا', 'description' => 'عمليات طلاء الكروم الزخرفي والصلب لمقاومة التآكل الفائقة.'],
                ],
            ],
            [
                'title' => 'Çinko Kaplamalar',
                'category' => 'Ürünlerimiz',
                'description' => 'Asitli çinko, siyanürsüz alkali çinko ve çinko-nikel alaşımlı kaplama prosesleri ile korozyona karşı üstün koruma.',
                'image' => 'assets/images/portfolio/portfolio-thumb-43.png',
                'is_featured' => false,
                'sort_order' => 6,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Asitli Çinko Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK666', 'description' => 'Amonyum ve potasyum klorür bazlı, yüksek parlaklık ve çizgi örtücülük sağlayan askı tipi asitli çinko parlatıcısı.'],
                            ['code' => 'TK665', 'description' => 'Yüksek bulanıklık noktasına (cloud point) sahip, banyonun sıcaklık toleransını 40°C üzerine çıkaran taşıyıcı bileşen.'],
                            ['code' => 'TK667 / TK668 P', 'description' => 'Dolap kaplamalarında mükemmel metal dağılımı ve hızlı kaplama sağlayan yüksek performanslı çinko katkısı.'],
                        ],
                    ],
                    [
                        'title' => 'Alkali Siyanürsüz Çinko Prosesleri',
                        'items' => [
                            ['code' => 'TK710', 'description' => 'Siyanür içermeyen, homojen kalınlık dağılımı sağlayan, sonrasında pasivasyona son derece uygun alkali çinko parlatıcısı.'],
                            ['code' => 'TK711 / TK712', 'description' => 'Alkali çinko banyolarında sert su ve ağır metal kirliliklerini bağlayan şartlandırıcı ve saflandırıcı katkılar.'],
                        ],
                    ],
                    [
                        'title' => 'Çinko-Nikel Alaşımlı Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK750', 'description' => '%12-15 nikel içeren, otomotiv sanayi normlarına uygun 1000+ saat kırmızı pas dayanımı sağlayan alkali Zn-Ni prosesi.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Zinc Plating', 'category' => 'Our Products', 'description' => 'Acid zinc, alkaline cyanide-free zinc, and zinc-nickel alloy plating processes.'],
                    'ar' => ['title' => 'طلاء الزنك', 'category' => 'منتجاتنا', 'description' => 'عمليات طلاء الزنك الحمضي والقلوي وسبائك الزنك-نيكل.'],
                ],
            ],
            [
                'title' => 'Diğer Kaplamalar',
                'category' => 'Ürünlerimiz',
                'description' => 'Kalay, pirinç ve antialerjik beyaz bronz (free nikel) kaplama prosesleri ile özel endüstriyel çözümler.',
                'image' => 'assets/images/portfolio/portfolio-thumb-45.png',
                'is_featured' => false,
                'sort_order' => 7,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Kalay Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK800', 'description' => 'Asitli parlak kalay kaplama prosesi; lehimlenebilir elektronik bileşenler ve mutfak eşyaları için idealdir.'],
                            ['code' => 'TK801', 'description' => 'Mat kalay kaplama prosesi; whisper (bıyık) oluşumunu engelleyen yüksek süneklikte kaplama verir.'],
                        ],
                    ],
                    [
                        'title' => 'Pirinç Kaplama Prosesleri',
                        'items' => [
                            ['code' => 'TK820', 'description' => 'Siyanürlü parlak sarı pirinç kaplama elektroliti; homojen renk dağılımı ve parlaklık sunar.'],
                        ],
                    ],
                    [
                        'title' => 'Free Nikel (Beyaz Bronz) Prosesleri',
                        'items' => [
                            ['code' => 'TK850', 'description' => 'Tekstil aksesuarları ve takılar için nikel içermeyen (nickel-free), antialerjik parlak beyaz bronz kaplama prosesi.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Other Plating Processes', 'category' => 'Our Products', 'description' => 'Tin, brass, and hypoallergenic white bronze (free nickel) plating processes.'],
                    'ar' => ['title' => 'طلاءات أخرى', 'category' => 'منتجاتنا', 'description' => 'طلاء القصدير والنحاس الأصفر والبرونز الأبيض الخالي من النيكل.'],
                ],
            ],
            [
                'title' => 'Pasivasyon Prosesleri',
                'category' => 'Ürünlerimiz',
                'description' => 'Çinko ve alaşımlı çinko kaplamalar için Cr+3 mavi, sarı ve nano partiküllü kalın film pasivasyon kimyasalları.',
                'image' => 'assets/images/portfolio/portfolio-thumb-42.png',
                'is_featured' => false,
                'sort_order' => 8,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Krom +3 Mavi Pasivasyon Prosesleri',
                        'items' => [
                            ['code' => 'TK610', 'description' => 'Asitli ve alkali çinko kaplamalar üzerine yüksek korozyon dirençli parlak Cr+3 mavi pasivasyon (120+ saat beyaz pas).'],
                        ],
                    ],
                    [
                        'title' => 'Krom +3 Sarı Pasivasyon Prosesleri',
                        'items' => [
                            ['code' => 'TK620', 'description' => 'Otomotiv ve ağır sanayi için geliştirilmiş, Cr+6 içermeyen yüksek dayanımlı (200+ saat beyaz pas) Cr+3 sarı pasivasyon.'],
                        ],
                    ],
                    [
                        'title' => 'Kalın Film Pasivasyon & Sealer (Top Coat)',
                        'items' => [
                            ['code' => 'TK630', 'description' => 'Nano-partiküllü formülasyonu ile 400+ saat beyaz pas direncine sahip Cr+3 kalın film pasivasyonu.'],
                            ['code' => 'TK635', 'description' => 'Pasivasyon üzeri uygulanan, korozyon direncini iki katına çıkaran inorganik sealer (mühürleme) sıvısı.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Passivation Processes', 'category' => 'Our Products', 'description' => 'Trivalent Cr+3 blue, yellow, and thick-film passivation chemicals for zinc coatings.'],
                    'ar' => ['title' => 'عمليات التخميل', 'category' => 'منتجاتنا', 'description' => 'كيماويات التخميل ثلاثي التكافؤ الأزرق والأصفر للحماية من التآكل.'],
                ],
            ],
            [
                'title' => 'Renklendirme (Oksitlendirme) Prosesleri',
                'category' => 'Ürünlerimiz',
                'description' => 'Bakır, pirinç, çinko ve zamak yüzeylerde antik, kahverengi ve homojen siyah oksit dekoratif renklendirme prosesleri.',
                'image' => 'assets/images/portfolio/portfolio-thumb-46.png',
                'is_featured' => false,
                'sort_order' => 9,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Bakır ve Pirinç Karartma (Antik Renklendirme)',
                        'items' => [
                            ['code' => 'TK900', 'description' => 'Bakır, pirinç ve bronz metaller üzerinde oda sıcaklığında çalışan, antik kahverengi ve siyah tonları veren karartma kimyasalı.'],
                            ['code' => 'TK902', 'description' => 'Antik görünüm sonrası yüzeyin fırçalanması ve sabitlenmesi için koruyucu fırça lak katkısı.'],
                        ],
                    ],
                    [
                        'title' => 'Çinko ve Zamak Karartma Prosesleri',
                        'items' => [
                            ['code' => 'TK910', 'description' => 'Çinko kaplı ve zamak döküm parçalar üzerinde homojen derin siyah oksit tabakası oluşturan daldırma banyosu.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Coloring (Oxidation) Processes', 'category' => 'Our Products', 'description' => 'Antique brown and deep black decorative oxidation processes.'],
                    'ar' => ['title' => 'عمليات التلوين والأكسدة', 'category' => 'منتجاتنا', 'description' => 'عمليات التعتيم والتلوين الديكوري للنحاس والزنك.'],
                ],
            ],
            [
                'title' => 'Akımsız Alüminyum Kaplama Prosesleri',
                'category' => 'Ürünlerimiz',
                'description' => 'Alüminyum ve alaşımları üzerine kaplama öncesi mükemmel tutunma sağlayan modifiye zinkat kimyasalları.',
                'image' => 'assets/images/portfolio/portfolio-thumb-47.png',
                'is_featured' => false,
                'sort_order' => 10,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Zinkat Prosesleri (Alüminyum Ön İşlem)',
                        'items' => [
                            ['code' => 'TK150', 'description' => 'Alüminyum ve alaşımları üzerine nikel/bakır kaplama öncesi uygulanan, oksit tabakasını sökerek mükemmel yapışma sağlayan sıvı zinkat prosesi.'],
                            ['code' => 'TK151', 'description' => 'Alkali nikel ve özel florür bileşikleri içeren, döküm alüminyum alaşımlarında kabarma ve soyulmayı önleyen modifiye zinkat banyosu.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Electroless Aluminum Plating Processes', 'category' => 'Our Products', 'description' => 'Modified zincate processes providing superior adhesion for aluminum.'],
                    'ar' => ['title' => 'عمليات طلاء الألمنيوم غير الكهربائي', 'category' => 'منتجاتنا', 'description' => 'عمليات الزنكات المعدلة لضمان الالتصاق التام للألمنيوم.'],
                ],
            ],
            [
                'title' => 'Lak',
                'category' => 'Ürünlerimiz',
                'description' => 'Su bazlı daldırma laklar ve diş yuvalarını tıkamayan kataforetik/elektroforetik koruyucu lak prosesleri.',
                'image' => 'assets/images/portfolio/portfolio-thumb-46.png',
                'is_featured' => false,
                'sort_order' => 11,
                'is_active' => true,
                'process_groups' => [
                    [
                        'title' => 'Su Esaslı Daldırma Lak Prosesleri',
                        'items' => [
                            ['code' => 'TK950', 'description' => 'Pasivasyon ve kaplama sonrası uygulanan, kuruma süresini kısaltan, su lekesi bırakmayan ve korozyon direncini artıran su bazlı koruyucu lak.'],
                        ],
                    ],
                    [
                        'title' => 'Elektroforetik Lak Prosesleri',
                        'items' => [
                            ['code' => 'TK960', 'description' => 'Özellikle vida, cıvata ve dişli parçalarda diş yuvalarında dolma yapmayan, yüksek çizilme ve korozyon dayanımlı kataforetik lak.'],
                            ['code' => 'TK965', 'description' => 'Şeffaf kataforetik lak banyolarına katılarak altın, pirinç, füme veya siyah tonlar elde edilmesini sağlayan boya pastaları.'],
                        ],
                    ],
                ],
                'translations' => [
                    'en' => ['title' => 'Lacquers & Coatings', 'category' => 'Our Products', 'description' => 'Water-based immersion lacquers and electrophoretic protective clear coats.'],
                    'ar' => ['title' => 'الورنيش والطلاء الواقي', 'category' => 'منتجاتنا', 'description' => 'الورنيش المائي والورنيش الكهربائي الواقي للأسطح والمسامير.'],
                ],
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['sort_order' => $product['sort_order']],
                $product
            );
        }

        if (TeamMember::query()->count() === 0) {
            $members = [
                [
                    'name' => 'Peter Hase',
                    'designation' => 'Sr. Engineer',
                    'image' => 'assets/images/team/team-thumb-01.png',
                    'twitter_url' => '#',
                    'facebook_url' => '#',
                    'linkedin_url' => '#',
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'name' => 'Lawrence Peter',
                    'designation' => 'Four Man',
                    'image' => 'assets/images/team/team-thumb-02.png',
                    'twitter_url' => '#',
                    'facebook_url' => '#',
                    'linkedin_url' => '#',
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'name' => 'Bradley Roy',
                    'designation' => 'Sr. Engineer',
                    'image' => 'assets/images/team/team-thumb-03.png',
                    'twitter_url' => '#',
                    'facebook_url' => '#',
                    'linkedin_url' => '#',
                    'sort_order' => 3,
                    'is_active' => true,
                ],
                [
                    'name' => 'John Maxwell',
                    'designation' => 'Team Manager',
                    'image' => 'assets/images/team/team-thumb-04.png',
                    'twitter_url' => '#',
                    'facebook_url' => '#',
                    'linkedin_url' => '#',
                    'sort_order' => 4,
                    'is_active' => true,
                ],
            ];

            foreach ($members as $member) {
                TeamMember::create($member);
            }
        }

        if (Testimonial::query()->count() === 0) {
            $testimonials = [
                [
                    'title' => 'Best Company!',
                    'comment' => 'Hampden-Sydney College in Virginia, looked up one of the more obscure latin words consectetur.',
                    'client_name' => 'Abdur Rashid',
                    'client_designation' => 'Founder & CEO',
                    'avatar' => 'assets/images/user/user-thumb-01.png',
                    'rating' => 5,
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'Popular Industry!',
                    'comment' => 'Hampden-Sydney College in Virginia, looked up one of the more obscure latin words consectetur.',
                    'client_name' => 'Christopher',
                    'client_designation' => 'Engineer',
                    'avatar' => 'assets/images/user/user-thumb-02.png',
                    'rating' => 5,
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'title' => 'Best Company!',
                    'comment' => 'Hampden-Sydney College in Virginia, looked up one of the more obscure latin words consectetur.',
                    'client_name' => 'Nayeem',
                    'client_designation' => 'Manager',
                    'avatar' => 'assets/images/user/user-thumb-03.png',
                    'rating' => 5,
                    'sort_order' => 3,
                    'is_active' => true,
                ],
                [
                    'title' => 'Best Company!',
                    'comment' => 'Hampden-Sydney College in Virginia, looked up one of the more obscure latin words consectetur.',
                    'client_name' => 'Joshua Pul',
                    'client_designation' => 'CEO Industry',
                    'avatar' => 'assets/images/user/user-thumb-04.png',
                    'rating' => 5,
                    'sort_order' => 4,
                    'is_active' => true,
                ],
            ];

            foreach ($testimonials as $testimonial) {
                Testimonial::create($testimonial);
            }
        }

        if (BlogPost::query()->count() === 0) {
            $posts = [
                [
                    'title' => 'Construction of a new high tech plant in washingtons',
                    'category' => 'Company',
                    'author' => 'Nayeem',
                    'published_date' => 'Feb 8, 2024',
                    'excerpt' => "Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and...",
                    'image' => 'assets/images/blog/blog-thumb-11.png',
                    'is_featured' => true,
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'Building resilient supply chains for',
                    'category' => 'Oil Factory',
                    'author' => 'Nayeem',
                    'published_date' => 'Feb 8, 2024',
                    'excerpt' => "Industry's standard dummy text ever....",
                    'image' => 'assets/images/blog/blog-thumb-12.png',
                    'is_featured' => false,
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'title' => 'Factories technologies in interactive and',
                    'category' => 'Manufacture',
                    'author' => 'Nayeem',
                    'published_date' => 'Feb 8, 2024',
                    'excerpt' => "Industry's standard dummy text ever....",
                    'image' => 'assets/images/blog/blog-thumb-13.png',
                    'is_featured' => false,
                    'sort_order' => 3,
                    'is_active' => true,
                ],
            ];

            foreach ($posts as $post) {
                BlogPost::create($post);
            }
        }

        $defaultSettings = [
            'site_title' => 'Teknokimya || Laboratuvar & Endüstriyel Kimya',
            'site_title_en' => 'Teknokimya || Laboratory & Coating Chemicals',
            'site_title_ar' => 'تكنوكيميا || كيماويات الطلاء والمختبرات',
            'contact_email' => 'info@teknokimya.com',
            'contact_phone' => '+90 (212) 555 01 02',
            'contact_schedule' => 'Pzt - Cmt 09.00 - 18.00',
            'contact_schedule_en' => 'Mon - Sat 09.00 - 18.00',
            'contact_schedule_ar' => 'الإثنين - السبت 09.00 - 18.00',
            'contact_address' => 'Organize Sanayi Bölgesi, Kimya Cad. No:42, İstanbul',
            'contact_address_en' => 'Organized Industrial Zone, Chemistry Ave. No:42, Istanbul',
            'contact_address_ar' => 'المنطقة الصناعية المنظمة، شارع الكيمياء رقم 42، إسطنبول',
            'about_subtitle' => 'Hakkımızda',
            'about_subtitle_en' => 'About Teknokimya',
            'about_subtitle_ar' => 'عن تكنوكيميا',
            'about_title' => 'Endüstriyel kaplama ve laboratuvar kimyasallarında yüksek saflık ve güvenilir çözümler üretiyoruz.',
            'about_title_en' => 'We design and manufacture high-purity industrial coating and laboratory chemical solutions.',
            'about_title_ar' => 'نصمم ونصنع حلولاً كيميائية عالية النقاء للطلاء الصناعي والمختبرات.',
            'about_description' => 'Dünya standartlarındaki Ar-Ge laboratuvarlarımız ve uzman mühendis kadromuzla endüstriyel yüzey işlem ve kaplama kimyasallarında her ihtiyaca özel çözümler geliştiriyoruz.',
            'about_description_en' => 'We solve worldwide industrial surface treatment and laboratory challenges with our advanced R&D laboratories and expert chemical engineers.',
            'about_description_ar' => 'نقدم حلولاً متكاملة لمعالجة الأسطح الصناعية وكيماويات الطلاء من خلال مختبرات البحث والتطوير المتقدمة وفريق المهندسين الخبراء لدينا.',
            'about_check_1' => 'Kalite Kontrol Sistemi',
            'about_check_1_en' => 'Quality Control System',
            'about_check_1_ar' => 'نظام مراقبة الجودة',
            'about_check_2' => 'Yüksek Standartlı Endüstriyel Üretim',
            'about_check_2_en' => 'Building Quality Industrial',
            'about_check_2_ar' => 'إنتاج صناعي عالي الجودة',
            'about_tab_1_title' => 'Tarihçemiz',
            'about_tab_1_title_en' => 'Our History',
            'about_tab_1_title_ar' => 'تاريخنا',
            'about_tab_2_title' => 'Misyonumuz',
            'about_tab_2_title_en' => 'Our Mission',
            'about_tab_2_title_ar' => 'مهمتنا',
            'about_tab_3_title' => 'Vizyonumuz',
            'about_tab_3_title_en' => 'Our Vision',
            'about_tab_3_title_ar' => 'رؤيتنا',
            'about_button_text' => 'İletişime Geç',
            'about_button_text_en' => 'Explore More',
            'about_button_text_ar' => 'تواصل معنا',
            'about_button_url' => '/contact',
            'about_image_large' => 'assets/images/about/about-thumb-20.png',
            'about_image_small' => 'assets/images/about/about-thumb-21.png',
            'about_home_image' => 'assets/images/about/about-thumb-08.png',
            'about_author_image' => 'assets/images/user/user-thumb-04.png',
            'about_signature_image' => 'assets/images/shape/sign-shape.png',
            'breadcrumb_bg_image' => 'assets/images/bg/breadcrumb-industrial-banner.jpg',
            'about_history' => 'Teknokimya, 30 yılı aşkın tecrübesiyle yüzey işlem, kaplama kimyasalları ve laboratuvar analiz çözümlerinde sektöre öncülük etmektedir.',
            'about_history_en' => 'Welcome to Teknokimya, a leading industry innovator with a rich history of excellence empowering industries for over 30 years.',
            'about_history_ar' => 'مرحباً بكم في تكنوكيميا، الرائدة في ابتكار حلول الكيمياء الصناعية وكيماويات الطلاء منذ أكثر من 30 عاماً.',
            'about_mission' => 'Misyonumuz; endüstriyel standartları yükselten güvenilir, sürdürülebilir ve yüksek saflıkta kimyasal çözümler sunmaktır.',
            'about_mission_en' => 'Our mission is to deliver reliable, sustainable, and high-purity chemical and laboratory solutions that elevate industrial standards.',
            'about_mission_ar' => 'مهمتنا هي تقديم حلول كيميائية ومخبرية موثوقة ومستدامة وعالية النقاء ترفع المعايير الصناعية.',
            'about_vision' => 'Vizyonumuz; kimyasal inovasyon ve kaplama teknolojilerinde küresel ölçekte en güvenilir çözüm ortağı olmaktır.',
            'about_vision_en' => 'Our vision is to become the most trusted global partner in chemical innovation and coating technology.',
            'about_vision_ar' => 'رؤيتنا هي أن نصبح الشريك العالمي الأكثر موثوقية في الابتكار الكيميائي وتكنولوجيا الطلاء.',
            'footer_description' => 'Teknokimya endüstriyel kimya ve laboratuvar çözümlerinde yüksek kalite standartlarıyla hizmet vermektedir.',
            'footer_description_en' => 'Teknokimya provides industrial coating chemicals and laboratory solutions with the highest quality standards.',
            'footer_description_ar' => 'تقدم تكنوكيميا كيماويات الطلاء الصناعي وحلول المختبرات بأعلى معايير الجودة.',
            'social_twitter' => '#',
            'social_facebook' => '#',
            'social_linkedin' => '#',
            'social_instagram' => '#',
        ];

        foreach ($defaultSettings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        MenuItem::query()->where('url', '/#about')->update(['url' => '/about']);

        // Seed EN & AR translations on Features if empty
        $featureTranslations = [
            1 => [
                'title' => 'Uluslararası Standartlarda Üretim',
                'description' => 'ISO ve uluslararası kalite standartlarına uygun yüksek saflıkta endüstriyel kaplama kimyasalları üretimi.',
                'translations' => [
                    'en' => [
                        'title' => 'International Standard Manufacturing',
                        'description' => 'High-purity industrial coating chemicals production in compliance with ISO and global quality standards.',
                    ],
                    'ar' => [
                        'title' => 'تصنيع بمعايير دولية',
                        'description' => 'إنتاج كيماويات الطلاء الصناعي عالية النقاء وفقاً لمعايير الأيزو والجودة العالمية.',
                    ],
                ],
            ],
            2 => [
                'title' => 'Yüksek Kalite & Ar-Ge Laboratuvarı',
                'description' => 'Gelişmiş analiz cihazlarımızla her parti üründe maksimum kalite kontrol ve özel formülasyon desteği.',
                'translations' => [
                    'en' => [
                        'title' => 'High Quality & R&D Laboratory',
                        'description' => 'Maximum quality control on every batch and custom formulation support with our advanced analytical instruments.',
                    ],
                    'ar' => [
                        'title' => 'جودة عالية ومختبر البحث والتطوير',
                        'description' => 'أقصى درجات مراقبة الجودة في كل دفعة ودعم التركيبات المخصصة بأحدث أجهزة التحليل.',
                    ],
                ],
            ],
            3 => [
                'title' => 'Uzman Mühendis Kadrosu',
                'description' => 'Yüzey işlem ve kaplama proseslerinde 30 yılı aşkın saha tecrübesine sahip kimya mühendisleri.',
                'translations' => [
                    'en' => [
                        'title' => 'Expert Engineering Team',
                        'description' => 'Chemical engineers with over 30 years of field experience in surface treatment and coating processes.',
                    ],
                    'ar' => [
                        'title' => 'فريق هندسي خبير',
                        'description' => 'مهندسون كيميائيون بخبرة ميدانية تزيد عن 30 عاماً في عمليات معالجة الأسطح والطلاء.',
                    ],
                ],
            ],
        ];

        foreach ($featureTranslations as $order => $data) {
            $feature = Feature::query()->where('sort_order', $order)->first();
            if ($feature && empty($feature->translations)) {
                $feature->update($data);
            }
        }
    }
}
