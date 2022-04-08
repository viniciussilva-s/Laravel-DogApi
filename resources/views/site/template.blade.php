<!DOCTYPE html>
<html>
    <head>
        <title>DOG API | @yield("title")</title>


        @include("site/components/style")

    </head>

    <div class="wrapper">
       @include("site/components/sidebar")
    
        <div class="main">
            @include("site/components/navigation")

			<main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">@yield("title")</h1>
                    </div>
                    @yield("conteudo")
                </div>
			</main>

            @include("site/components/footer")
		</div>
	</div>
    @include("site/components/javascript")
</html>