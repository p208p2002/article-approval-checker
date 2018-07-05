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
        </div>
        <br>
        <form action={{url('/search')}} method="post">
            <span>search article</span>
            <input type="text" name="searchText" placeholder="article url...">
            <button type="submit">search</button>        
        </form>
        <br>        
        <h3>Top 10 popular vote</h3>
        <div class="row text-left row-title">
            <div class="col-1">Rank</div>
            <div class="col">Article url</div>
            <div class="col">Postive rate</div>
            <div class="col">Argee</div>
            <div class="col">Disagee</div>
            <div class="col">Join date</div>
        </div>

        <?php $index=1; ?>
            @foreach($mostVoteds as $mostVoted)
            <div class="row text-left">
                <div class="col-1">{{ $index }}</div>
                <div class="col url-text"><a href={{ $mostVoted->articleurl }}>{{ $mostVoted->articleurl }}</a></div>
                <div class="col">
                    <?php 
                        $isuseful=$mostVoted->isuseful;
                        $notuseful=$mostVoted->notuseful;
                        if($isuseful == 0 & $notuseful ==0 || $isuseful==0){
                            echo '0.00';
                        }
                        else{
                            echo round(($isuseful/($isuseful+$notuseful)),2);
                        }
                    ?>
                </div>
                <div class="col">{{ $mostVoted->isuseful }}</div>
                <div class="col">{{ $mostVoted->notuseful }}</div>
                <div class="col">{{$mostVoted->added_on}}</div>
            </div>
            <?php $index++; ?>
            @endforeach  
                        
        <hr>
        
        <h3>New votes</h3>
        <div class="row text-left row-title">
            <div class="col-1">Rank</div>
            <div class="col">Article url</div>
            <div class="col">Postive rate</div>
            <div class="col">Argee</div>
            <div class="col">Disagee</div>
            <div class="col">Join date</div>
        </div>

        <?php $index=1; ?>
            @foreach($newVotes as $newVote)
            <div class="row text-left">
                <div class="col-1">{{ $index }}</div>
                <div class="col url-text"><a href={{ $newVote->articleurl }}>{{ $newVote->articleurl }}</a></div>
                <div class="col">
                    <?php 
                        $isuseful=$newVote->isuseful;
                        $notuseful=$newVote->notuseful;
                        if($isuseful == 0 & $notuseful ==0 || $isuseful==0){
                            echo '0.00';
                        }
                        else{
                            echo round(($isuseful/($isuseful+$notuseful)),2);
                        }
                    ?>
                </div>
                <div class="col">{{ $newVote->isuseful }}</div>
                <div class="col">{{ $newVote->notuseful }}</div>
                <div class="col">{{$newVote->added_on}}</div>
            </div>
            <?php $index++; ?>
            @endforeach  
    </div>    
    <footer class="text-center">
        <hr>
        2018 Philip Huang
    </footer>
</body>
</html>