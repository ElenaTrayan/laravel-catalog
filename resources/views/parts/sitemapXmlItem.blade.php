<url>
    <loc>{{ $item->getUrl() }}</loc>
    @if($item->updated_at)
        <lastmod>{{ \App\Helpers\Date::dateFormatForSchema($item->updated_at) }}</lastmod>
    @else
        <lastmod>{{ \App\Helpers\Date::dateFormatForSchema($item->published_at) }}</lastmod>
    @endif
    @if($item->type == \App\Models\Page::TYPE_SYSTEM_PAGE)
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    @elseif($item->type == \App\Models\Page::TYPE_PAGE)
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    @else
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    @endif
</url>