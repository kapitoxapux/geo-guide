<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://geo-guide.ru</loc>
        <lastmod>2020-10-08T00:00:00+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://geo-guide.ru/404</loc>
        <lastmod>2020-10-08T00:00:00+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
  	<url>
        <loc>https://geo-guide.ru/geodesy</loc>
        <lastmod>2020-10-08T00:00:00+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
  	<url>
        <loc>https://geo-guide.ru/geology</loc>
        <lastmod>2020-10-08T00:00:00+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://geo-guide.ru/hydraulics</loc>
        <lastmod>2020-10-08T00:00:00+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach($geodesy as $row)
        <url>
            <loc>https://geo-guide.ru/geodesy/{{$row->id}}</loc>
            <lastmod>{{\Carbon\Carbon::parse($row->updated_at)->tz('GMT')->toAtomString()}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach($geology as $row1)
        <url>
            <loc>https://geo-guide.ru/geology/{{$row1->id}}</loc>
            <lastmod>{{\Carbon\Carbon::parse($row1->updated_at)->tz('GMT')->toAtomString()}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach($hydraulics as $row2)
        <url>
            <loc>https://geo-guide.ru/hydraulics/{{$row2->id}}</loc>
            <lastmod>{{\Carbon\Carbon::parse($row2->updated_at)->tz('GMT')->toAtomString()}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
