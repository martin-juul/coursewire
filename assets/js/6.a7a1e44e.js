(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{186:function(t,s,a){t.exports=a.p+"assets/img/dashboard.f3e8d91e.png"},187:function(t,s,a){t.exports=a.p+"assets/img/resource-tight-table.034a9bb5.png"},188:function(t,s,a){t.exports=a.p+"assets/img/resource-column-borders.a0adc54c.png"},189:function(t,s,a){t.exports=a.p+"assets/img/simple-pagination.6ec552ae.png"},190:function(t,s,a){t.exports=a.p+"assets/img/load-more-pagination.dd3ece07.png"},191:function(t,s,a){t.exports=a.p+"assets/img/links-pagination.a16d5a6b.png"},269:function(t,s,a){"use strict";a.r(s);var e=a(2),n=Object(e.a)({},(function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[e("h1",{attrs:{id:"the-basics"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#the-basics"}},[t._v("#")]),t._v(" The Basics")]),t._v(" "),e("p"),e("div",{staticClass:"table-of-contents"},[e("ul",[e("li",[e("a",{attrs:{href:"#defining-resources"}},[t._v("Defining Resources")])]),e("li",[e("a",{attrs:{href:"#registering-resources"}},[t._v("Registering Resources")])]),e("li",[e("a",{attrs:{href:"#grouping-resources"}},[t._v("Grouping Resources")])]),e("li",[e("a",{attrs:{href:"#resource-table-style-customization"}},[t._v("Resource Table Style Customization")]),e("ul",[e("li",[e("a",{attrs:{href:"#table-styles"}},[t._v("Table styles")])]),e("li",[e("a",{attrs:{href:"#column-borders"}},[t._v("Column Borders")])])])]),e("li",[e("a",{attrs:{href:"#eager-loading"}},[t._v("Eager Loading")])]),e("li",[e("a",{attrs:{href:"#resource-events"}},[t._v("Resource Events")])]),e("li",[e("a",{attrs:{href:"#preventing-conflicts"}},[t._v("Preventing Conflicts")]),e("ul",[e("li",[e("a",{attrs:{href:"#disabling-traffic-cop"}},[t._v("Disabling Traffic Cop")])])])]),e("li",[e("a",{attrs:{href:"#preventing-accidental-resource-form-abandonment"}},[t._v("Preventing Accidental Resource Form Abandonment")])]),e("li",[e("a",{attrs:{href:"#keyboard-shortcuts"}},[t._v("Keyboard Shortcuts")])]),e("li",[e("a",{attrs:{href:"#pagination"}},[t._v("Pagination")])]),e("li",[e("a",{attrs:{href:"#customizing-pagination"}},[t._v("Customizing Pagination")])])])]),e("p"),t._v(" "),e("p",[t._v('Laravel Nova is a beautiful administration dashboard for Laravel applications. Of course, the primary feature of Nova is the ability to administer your underlying database records using Eloquent. Nova accomplishes this by allowing you to define a Nova "resource" that corresponds to each Eloquent model in your application.')]),t._v(" "),e("h2",{attrs:{id:"defining-resources"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#defining-resources"}},[t._v("#")]),t._v(" Defining Resources")]),t._v(" "),e("p",[t._v("By default, Nova resources are stored in the "),e("code",[t._v("app/Nova")]),t._v(" directory of your application. You may generate a new resource using the "),e("code",[t._v("nova:resource")]),t._v(" Artisan command:")]),t._v(" "),e("div",{staticClass:"language-bash extra-class"},[e("pre",{pre:!0,attrs:{class:"language-bash"}},[e("code",[t._v("php artisan nova:resource Post\n")])])]),e("p",[t._v("The most basic and fundamental property of a resource is its "),e("code",[t._v("model")]),t._v(" property. This property tells Nova which Eloquent model the resource corresponds to:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * The model the resource corresponds to.\n *\n * @var string\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$model")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'App\\Post'")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("p",[t._v("Freshly created Nova resources only contain an "),e("code",[t._v("ID")]),t._v(" field definition. Don't worry, we'll add more fields to our resource soon.")]),t._v(" "),e("div",{staticClass:"custom-block warning"},[e("p",{staticClass:"custom-block-title"},[t._v("Reserved Resource Names")]),t._v(" "),e("p",[t._v("Nova contains a few reserved words, which may not be used for resource names.")]),t._v(" "),e("ul",[e("li",[t._v("Field")]),t._v(" "),e("li",[t._v("Script")]),t._v(" "),e("li",[t._v("Resource")]),t._v(" "),e("li",[t._v("Card")]),t._v(" "),e("li",[t._v("Tool")]),t._v(" "),e("li",[t._v("Dashboard")]),t._v(" "),e("li",[t._v("Metric")])])]),t._v(" "),e("h2",{attrs:{id:"registering-resources"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#registering-resources"}},[t._v("#")]),t._v(" Registering Resources")]),t._v(" "),e("div",{staticClass:"custom-block tip"},[e("p",{staticClass:"custom-block-title"},[t._v("Automatic Registration")]),t._v(" "),e("p",[t._v("By default, all resources within the "),e("code",[t._v("app/Nova")]),t._v(" directory will automatically be registered with Nova. You are not required to manually register them.")])]),t._v(" "),e("p",[t._v("Before resources are available within your Nova dashboard, they must first be registered with Nova. Resources are typically registered in your "),e("code",[t._v("app/Providers/NovaServiceProvider.php")]),t._v(" file. This file contains various configuration and bootstrapping code related to your Nova installation.")]),t._v(" "),e("p",[e("strong",[t._v("As mentioned above, you are not required to manually register your resources; however, if you choose to do so, you may do so by overriding the "),e("code",[t._v("resources")]),t._v(" method of your "),e("code",[t._v("NovaServiceProvider")])]),t._v(".")]),t._v(" "),e("p",[t._v("There are two approaches to manually registering resources. You may use the "),e("code",[t._v("resourcesIn")]),t._v(" method to instruct Nova to register all Nova resources within a given directory. Alternatively, you may use the "),e("code",[t._v("resources")]),t._v(" method to manually register individual resources:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Nova"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("User")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Nova"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Post")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Register the application's Nova resources.\n *\n * @return void\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("protected")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("resources")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n    Nova"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("resourcesIn")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("app_path")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'Nova'")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n    Nova"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("resources")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n        User"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("class")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n        Post"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("class")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n")])])]),e("p",[t._v("Once your resources are registered with Nova, they will be available in the Nova sidebar:")]),t._v(" "),e("p",[e("img",{attrs:{src:a(186),alt:"Nova Dashboard"}})]),t._v(" "),e("p",[t._v("If you do not want a resource to appear in the sidebar, you may override the "),e("code",[t._v("displayInNavigation")]),t._v(" property of your resource class:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Indicates if the resource should be displayed in the sidebar.\n *\n * @var bool\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$displayInNavigation")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token boolean constant"}},[t._v("false")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("h2",{attrs:{id:"grouping-resources"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#grouping-resources"}},[t._v("#")]),t._v(" Grouping Resources")]),t._v(" "),e("p",[t._v("If you would like to separate resources into different sidebar groups, you may override the "),e("code",[t._v("group")]),t._v(" property of your resource class:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * The logical group associated with the resource.\n *\n * @var string\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$group")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'Admin'")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("h2",{attrs:{id:"resource-table-style-customization"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#resource-table-style-customization"}},[t._v("#")]),t._v(" Resource Table Style Customization")]),t._v(" "),e("p",[t._v("Nova supports a few visual customization options for your resources.")]),t._v(" "),e("h3",{attrs:{id:"table-styles"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#table-styles"}},[t._v("#")]),t._v(" Table styles")]),t._v(" "),e("p",[t._v('Sometimes it\'s convenient to show more data on your resource index tables. To accomplish this, you can use the "tight" table style option designed to increase the visual density of your table rows. Override the static '),e("code",[t._v("$tableStyle")]),t._v(" property or the static "),e("code",[t._v("tableStyle")]),t._v(" method on your Resource class:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * The visual style used for the table. Available options are 'tight' and 'default'.\n *\n * @var string\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$tableStyle")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'default'")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("p",[t._v("This will display your table rows with less visual height, enabling more data to be shown:")]),t._v(" "),e("p",[e("img",{attrs:{src:a(187),alt:"Tight Table Style"}})]),t._v(" "),e("h3",{attrs:{id:"column-borders"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#column-borders"}},[t._v("#")]),t._v(" Column Borders")]),t._v(" "),e("p",[t._v("You can show borders on the sides of columns by overriding the static "),e("code",[t._v("$showColumnBorders")]),t._v(" property or the static "),e("code",[t._v("showColumnBorders")]),t._v(" method on your Resource class:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Whether to show borders for each column on the X-axis.\n *\n * @var bool\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$showColumnBorders")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token boolean constant"}},[t._v("true")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("p",[t._v("This will display the table with borders on every table item:")]),t._v(" "),e("p",[e("img",{attrs:{src:a(188),alt:"Table Column Borders"}})]),t._v(" "),e("h2",{attrs:{id:"eager-loading"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#eager-loading"}},[t._v("#")]),t._v(" Eager Loading")]),t._v(" "),e("p",[t._v("If you routinely need to access a resource's relationships within your fields, "),e("RouterLink",{attrs:{to:"/nova/search/global-search.html#title-subtitle-attributes"}},[t._v("resource title")]),t._v(", or "),e("RouterLink",{attrs:{to:"/nova/search/global-search.html#title-subtitle-attributes"}},[t._v("resource subtitle")]),t._v(", it may be a good idea to add the relationship to the "),e("code",[t._v("with")]),t._v(" property of your resource. This property instructs Nova to always eager load the listed relationships when retrieving the resource.")],1),t._v(" "),e("p",[t._v("For example, if you access a "),e("code",[t._v("Post")]),t._v(" resource's "),e("code",[t._v("user")]),t._v(" relationship within the "),e("code",[t._v("Post")]),t._v(" resource's "),e("code",[t._v("subtitle")]),t._v(" method, you should add the "),e("code",[t._v("user")]),t._v(" relationship to the "),e("code",[t._v("Post")]),t._v(" resource's "),e("code",[t._v("with")]),t._v(" property:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * The relationships that should be eager loaded on index queries.\n *\n * @var array\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$with")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'user'")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("h2",{attrs:{id:"resource-events"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#resource-events"}},[t._v("#")]),t._v(" Resource Events")]),t._v(" "),e("p",[t._v("All Nova operations use the typical "),e("code",[t._v("save")]),t._v(", "),e("code",[t._v("delete")]),t._v(", "),e("code",[t._v("forceDelete")]),t._v(", "),e("code",[t._v("restore")]),t._v(" Eloquent methods you are familiar with. Therefore, it is easy to listen for model events triggered by Nova and react to them. The easiest approach is to simply attach a "),e("a",{attrs:{href:"https://laravel.com/docs/eloquent#observers",target:"_blank",rel:"noopener noreferrer"}},[t._v("model observer"),e("OutboundLink")],1),t._v(" to a model:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("namespace")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Providers")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("User")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Observers"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("UserObserver")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("Illuminate"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Support"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("ServiceProvider")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("class")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token class-name"}},[t._v("AppServiceProvider")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("extends")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token class-name"}},[t._v("ServiceProvider")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n     * Bootstrap any application services.\n     *\n     * @return void\n     */")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("boot")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n        User"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("observe")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("UserObserver"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("class")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n\n    "),e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n     * Register the service provider.\n     *\n     * @return void\n     */")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("register")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n        "),e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("//")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n")])])]),e("p",[t._v("If you would like to attach any observer "),e("strong",[t._v("only during")]),t._v(" Nova related HTTP requests, you may register observers within "),e("code",[t._v("Nova::serving")]),t._v(" event listener in your application's "),e("code",[t._v("NovaServiceProvider")]),t._v(". This listener will only be executed during Nova requests:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("User")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("Laravel"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Nova"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Nova")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Observers"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("UserObserver")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Bootstrap any application services.\n *\n * @return void\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("boot")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("parent")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("boot")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n    Nova"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("serving")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n        User"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("observe")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("UserObserver"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("class")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n")])])]),e("h2",{attrs:{id:"preventing-conflicts"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#preventing-conflicts"}},[t._v("#")]),t._v(" Preventing Conflicts")]),t._v(" "),e("p",[t._v("If the model has been updated since the retrieval, Nova will automatically respond with a "),e("code",[t._v("409 Conflict")]),t._v(' status code and display an error message to prevent unintentional model changes. This may occur if another user updates the model after you have opened the "Edit" screen on the resource. This feature is also known as "Traffic Cop".')]),t._v(" "),e("h3",{attrs:{id:"disabling-traffic-cop"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#disabling-traffic-cop"}},[t._v("#")]),t._v(" Disabling Traffic Cop")]),t._v(" "),e("p",[t._v("If you are not concerned with preventing conflicts, you can disable the Traffic Cop feature:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Indicates whether Nova should check for modifications between viewing and updating a resource.\n *\n * @var bool\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$trafficCop")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token boolean constant"}},[t._v("true")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("p",[t._v("You may also override the "),e("code",[t._v("trafficCop")]),t._v(" method on the resource:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Indicates whether Nova should check for modifications between viewing and updating a resource.\n *\n * @param  \\Illuminate\\Http\\Request  $request\n * @return  bool\n*/")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("trafficCop")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("Request "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$request")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(":")]),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$trafficCop")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n")])])]),e("div",{staticClass:"custom-block tip"},[e("p",{staticClass:"custom-block-title"},[t._v("Time Synchronization")]),t._v(" "),e("p",[t._v("Before disabling Traffic Cop, if you are experiencing issues you may first want to check that the system time is correctly synchronized using NTP.")])]),t._v(" "),e("h2",{attrs:{id:"preventing-accidental-resource-form-abandonment"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#preventing-accidental-resource-form-abandonment"}},[t._v("#")]),t._v(" Preventing Accidental Resource Form Abandonment")]),t._v(" "),e("p",[t._v("When creating and editing resource forms with many fields, you may wish to prevent the user from accidentally leaving the form due to a misclick. You can enable this for each of your resources by setting the static "),e("code",[t._v("preventFormAbandonment")]),t._v(" property to "),e("code",[t._v("true")]),t._v(":")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * Indicates whether Nova should prevent the user from leaving an unsaved form, losing their data.\n *\n * @var bool\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$preventFormAbandonment")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token boolean constant"}},[t._v("false")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("h2",{attrs:{id:"keyboard-shortcuts"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#keyboard-shortcuts"}},[t._v("#")]),t._v(" Keyboard Shortcuts")]),t._v(" "),e("p",[t._v("You may press the "),e("code",[t._v("C")]),t._v(' key on a resource index to navigate to the "Create Resource" screen. On the resource detail screen, the '),e("code",[t._v("E")]),t._v(' key may be used to navigate to the "Update Resource" screen.')]),t._v(" "),e("h2",{attrs:{id:"pagination"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#pagination"}},[t._v("#")]),t._v(" Pagination")]),t._v(" "),e("p",[t._v('Nova has the ability to show pagination links for your Resource listings. You can choose between three different styles: "simple", "load-more", and "links", depending on your application\'s needs:')]),t._v(" "),e("p",[e("img",{attrs:{src:a(189),alt:"Simple Pagination"}})]),t._v(" "),e("p",[e("img",{attrs:{src:a(190),alt:"Load-more Pagination"}})]),t._v(" "),e("p",[e("img",{attrs:{src:a(191),alt:"Links Pagination"}})]),t._v(" "),e("p",[t._v('By default, Nova Resources are displayed using the "simple" style. However, you may customize this to use either the "load-more" or "links" style. You can enable this by setting the '),e("code",[t._v("pagination")]),t._v(" option in your "),e("code",[t._v("nova")]),t._v(" configuration file:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'pagination'")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'links'")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n")])])]),e("h2",{attrs:{id:"customizing-pagination"}},[e("a",{staticClass:"header-anchor",attrs:{href:"#customizing-pagination"}},[t._v("#")]),t._v(" Customizing Pagination")]),t._v(" "),e("p",[t._v("If you'd like to customize the amounts shown on each resource's \"per page\" filter menu, you can do so by customizing its "),e("code",[t._v("perPageOptions")]),t._v(" property:")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token comment"}},[t._v("/**\n * The pagination per-page options configured for this resource.\n *\n * @return array\n */")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$perPageOptions")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),e("span",{pre:!0,attrs:{class:"token number"}},[t._v("50")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token number"}},[t._v("100")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token number"}},[t._v("150")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),e("p",[t._v("Alternatively, you can override the "),e("code",[t._v("perPageOptions")]),t._v(" method on the "),e("code",[t._v("Resource")]),t._v(":")]),t._v(" "),e("div",{staticClass:"language-php extra-class"},[e("pre",{pre:!0,attrs:{class:"language-php"}},[e("code",[e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("public")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("static")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token function"}},[t._v("perPageOptions")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n    "),e("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),e("span",{pre:!0,attrs:{class:"token number"}},[t._v("50")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token number"}},[t._v("100")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" "),e("span",{pre:!0,attrs:{class:"token number"}},[t._v("150")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n"),e("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),t._v("\n")])])]),e("div",{staticClass:"custom-block tip"},[e("p",{staticClass:"custom-block-title"},[t._v("Customizing `perPageOptions` affects the initial amount of resources fetched.")]),t._v(" "),e("p",[t._v("Changing the value of "),e("code",[t._v("perPageOptions")]),t._v(" on your "),e("code",[t._v("Resource")]),t._v(" will cause Nova to fetch the number of resources equal to the first value in the "),e("code",[t._v("perPageOptions")]),t._v(" array.")])])])}),[],!1,null,null,null);s.default=n.exports}}]);