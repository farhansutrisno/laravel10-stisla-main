<style type="text/css">
    body {
        font: 11px/120% Tahoma, Geneva, sans-serif;
    }

    h1 {
        font: 16px/120% Tahoma, Geneva, sans-serif;
        font-weight: bold;
    }

    ul {
        margin: 0px;
        padding: 0px
    }

    ul li {
        font: 14px/120% Tahoma, Geneva, sans-serif;
        padding-bottom: 5px;
    }

    .money {
        text-align: right !important;
    }
</style>
<h1>PT. ANTARMITRA SEMBADA</h1>

        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr style="background:#f4f4f4; border-top:1px solid #666; border-bottom:1px solid #666;">
                    <th style="border:1px solid #666; padding:10px; text-align:left;">Judul</th>
                    <th style="border:1px solid #666; padding:10px; text-align:left;">Content</th>
                    <th style="border:1px solid #666; padding:10px; text-align:left;">Create At</th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 1?>
                @foreach($posts as $post)
                <tr style="font-size:11px; border-bottom:1px solid #666;">
                    <td valign="top" style="border:1px solid #666; padding:10px; text-align:left;">{{ $post->title }}</td>
                    <td valign="top" style="border:1px solid #666; padding:10px; text-align:left;">{{ $post->content }}</td>
                    <td valign="top" style="border:1px solid #666; padding:10px; text-align:left;">{{ $post->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
