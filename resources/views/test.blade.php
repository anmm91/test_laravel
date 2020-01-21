
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<button type="submit"> ajax request</button>
{{$name}}
<select name="" id="">
    <option>ali</option>
    <option>ahmed</option>
</select>
<div></div>

<script>
$("select").change(function () {
    $.ajax({
                url:'ajax-test',
                type:'get',
                success:function (data) {
                    $('div').html(data);
                }
    });
});
$("button").click(function () {
    $.ajax({
        url:'ajax-test',
        type:'get',
        success:function (data) {
            $('div').html(data);
        }
    });
});
// $("button").hover(function () {
//     $.ajax({
//         url:'ajax-test',
//         type:'get',
//         success:function (data) {
//             $('div').text(data);
//             console.log(data);
//         }
//     });
// });
</script>
