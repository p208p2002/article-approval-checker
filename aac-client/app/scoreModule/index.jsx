import React from 'react';
import axios from 'axios';
import { SERVER_URL } from '../setting'


export class index extends React.Component {
    constructor(props){
        super(props)
        this.isUseful=this.isUseful.bind(this)
        this.notUseful=this.notUseful.bind(this)
        this.getVote=this.getVote.bind(this)
        this.lockVote=this.lockVote.bind(this)

        this.state={
            useful : 0,
            notUseful : 0,
            votelock : 0,
            message : 'Loading...',
            loading:true
        }
    }

    componentDidMount(){
       this.getVote()
    }

    getVote(){
        var uri = window.location.href;
        var res = encodeURIComponent(uri);
        // console.log(res)

        axios.get(SERVER_URL+'/api/init?articleurl='+res).then((response)=>{
            // console.log(response.data)
            this.setState({
                useful:response.data.isuseful,
                notUseful:response.data.notuseful,
                message : 'thecodingday.com',
                loading:false
            })
        })
    }

    lockVote(){
        this.setState({
            votelock : 1,
            message : 'thanks for vote ^^'
        })

        setTimeout(
            ()=>{
                this.setState({
                    message : 'thecodingday.com'
                })
            },2000)
    }

    isUseful(){
        if(this.state.votelock==0){
            var uri = window.location.href;
            var res = encodeURIComponent(uri);
            axios.get(SERVER_URL+'/api/vote/useful?articleurl='+res);
            this.lockVote();

            var useful = this.state.useful
            useful++ 
            this.setState({
                useful:useful
            })
        }
    }

    notUseful(){
        if(this.state.votelock==0){
            var uri = window.location.href;
            var res = encodeURIComponent(uri);
            axios.get(SERVER_URL+'/api/vote/notuseful?articleurl='+res);
            this.lockVote();

            var notUseful = this.state.notUseful
            notUseful++ 
            this.setState({
                notUseful:notUseful
            })
        }
    }

    render() { 
        let {loading,message} = this.state;
        return (
            <div className="acc-border">
                <h3 className="aac-title aac-text-center">Useful Article?</h3>
                <div className="aac-row">
                <div className="aac-col-1 aac-text-center acc-center">
                    <img src="https://p208p2002.github.io/article-approval-checker/aac-client/src/checked.png" 
                        width="40" alt="is useful" onClick={this.isUseful} />
                    <br/>
                    <p className="aac-text-success">YES : {this.state.useful}</p>                    
                </div>

                <div className="aac-col-1 aac-text-center acc-center">
                    <img src="https://p208p2002.github.io/article-approval-checker/aac-client/src/unchecked.png" 
                        width="40" alt="not useful" onClick={this.notUseful}/>
                    <br/>                    
                    <p className="aac-text-danger">NO : {this.state.notUseful}</p>
                </div>
                </div>

                <div className="aac-text-center">
                    <h3 className="aac-text-secondary">{message}</h3>
                </div>
            </div>
        )
    }
}
 
export default index;