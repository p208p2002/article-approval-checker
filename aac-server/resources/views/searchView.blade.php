<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article approval checker</title>
    <link rel="stylesheet" href={{ url('/style/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ url('/style/style.css') }}>
</head>
<body>
    <div class="container">
        <a href={{ url('/') }}>Back to home</a>
        <br>
        <br>
        <form action={{url('/search')}} method="post">
            <span>search article</span>
            <input type="text" name="searchText" placeholder="article url...">
            <button type="submit">search</button>        
        </form>
        <hr>
        <div class="row text-left row-title d-none d-md-flex">
            <div class="col-1">Rank</div>
            <div class="col">Article url</div>
            <div class="col">Postive rate</div>
            <div class="col">Argee</div>
            <div class="col">Disagee</div>
            <div class="col">Join date</div>
        </div>
        <?php $index=1; ?>
            @foreach($results as $vote)
            <div class="row text-left">
                <div class="col-12 col-md-1">                    
                    <b class="row-title d-inline d-md-none">Rank:</b>
                    {{ $index }}
                </div>
                <div class="col-12 col-md url-text">
                    <b class="row-title d-inline d-md-none">Url:</b>
                    <a href={{ $vote->articleurl }} target="_blank">{{ $vote->articleurl }}</a>
                </div>
                <div class="col-12 col-md">
                    <b class="row-title d-inline d-md-none">Postive rate</b>
                    <?php 
                        $isuseful=$vote->isuseful;
                        $notuseful=$vote->notuseful;
                        if($isuseful == 0 & $notuseful ==0 || $isuseful==0){
                            echo '0.00';
                        }
                        else{
                            echo round(($isuseful/($isuseful+$notuseful)),2);
                        }
                    ?>
                </div>
                <div class="col-12 col-md d-none d-md-flex">{{ $vote->isuseful }}</div>
                <div class="col-12 col-md d-none d-md-flex">{{ $vote->notuseful }}</div>
                <div class="col-12 col-md d-none d-md-flex">{{$vote->added_on}}</div>

                <div class="block d-block d-md-none">&nbsp;</div>
            </div>
            <?php $index++; ?>
            @endforeach  
    </div>
    <!-- <footer class="text-center">
        <hr>
        2018 Philip Huang
    </footer> -->
</body>
</html>