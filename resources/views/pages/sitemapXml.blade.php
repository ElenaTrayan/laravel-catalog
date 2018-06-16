<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="' . asset('sitemap.xsl') . '"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach($sitemapItems as $item)
        @include('parts.sitemapXmlItem')

        {{ \App\Helpers\View::getChildrenPages($item, $item->getUrl(), 1, 'xml') }}
    @endforeach

</urlset>