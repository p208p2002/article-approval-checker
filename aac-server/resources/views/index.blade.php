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
        <h1>Welcome to Article approval checker</h1>
        <div>
        AAC is a system can help you to judge article on the internet, 
        just one click to join the vote,
        with the vote result we can help people to find out the good article and save time to solve their problem!        
        And also see <a href="https://github.com/p208p2002/article-approval-checker">this project</a> on github:D
        </div>
        <br>
        <form action={{url('/search')}} method="post">
            <span>search article</span>
            <input type="text" name="searchText" placeholder="article url...">
            <button type="submit">search</button>        
        </form>
        <br>        
        <h3>Top 10 popular vote</h3>
        <div class="row text-left row-title d-none d-md-flex">
            <div class="col-md-1">Rank</div>
            <div class="col-md">Article url</div>
            <div class="col-md">Postive rate</div>
            <div class="col-md">Argee</div>
            <div class="col-md">Disagee</div>
            <div class="col-md">Join date</div>
        </div>
        
        <!-- <div class="text d-block d-md-none">111</div> -->

        <?php $index=1; ?>
            @foreach($mostVoteds as $vote)
            <div class="row text-left">
                <div class="col-12 col-md-1">                    
                    <b class="row-title d-inline d-md-none">Rank:</b>
                    {{ $index }}
                </div>
                <div class="col-12 col-md url-text">
                    <b class="row-title d-inline d-md-none">Url:</b>
                    <a href={{ $vote->articleurl }}>{{ $vote->articleurl }}</a>
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
                        
        <hr>
        
        <h3>New votes</h3>
        <div class="row text-left row-title d-none d-md-flex">
            <div class="col-md-1">Rank</div>
            <div class="col-md">Article url</div>
            <div class="col-md">Postive rate</div>
            <div class="col-md">Argee</div>
            <div class="col-md">Disagee</div>
            <div class="col-md">Join date</div>
        </div>

        <?php $index=1; ?>
            @foreach($newVotes as $vote)
            <div class="row text-left">
                <div class="col-12 col-md-1">                    
                    <b class="row-title d-inline d-md-none">Rank:</b>
                    {{ $index }}
                </div>
                <div class="col-12 col-md url-text">
                    <b class="row-title d-inline d-md-none">Url:</b>
                    <a href={{ $vote->articleurl }}>{{ $vote->articleurl }}</a>
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