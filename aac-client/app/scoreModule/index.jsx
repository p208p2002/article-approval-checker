import React from 'react';
import axios from 'axios';
import { SERVER_URL } from '../setting'


export class index extends React.Component {
    constructor(props){
        super(props)
        this.isUseful=this.isUseful.bind(this)
        this.notUseful=this.notUseful.bind(this)

        this.state={
            useful : 0,
            notUseful : 0   
        }

    }

    componentDidMount(){

        axios.get(SERVER_URL+'/api/init').then((response)=>{
            // console.log(response.data)
            this.setState({
                useful:response.data.isuseful,
                notUseful:response.data.notuseful
            })
        })

    }

    isUseful(){
        let useful = this.state.useful
        useful++
        this.setState({
            useful : useful
        })
    }

    notUseful(){
        let notUseful = this.state.notUseful
        notUseful++
        this.setState({
            notUseful : notUseful
        })
    }

    render() { 

        return (
            <div className="acc-border">
                <h3 className="aac-title aac-text-center">Useful Article?</h3>
                <div className="aac-row">
                <div className="aac-col-1 aac-text-center acc-center">
                    <img src="https://p208p2002.github.io/article-approval-checker/aac-client/src/checked.png" 
                        width="40" alt="is useful" onClick={this.isUseful} />
                    <br/>
                    <a href="#" className="aac-text-success">
                    <p className="aac-text-success">YES : {this.state.useful}</p>
                    </a>
                </div>

                <div className="aac-col-1 aac-text-center acc-center">
                    <img src="https://p208p2002.github.io/article-approval-checker/aac-client/src/unchecked.png" 
                        width="40" alt="not useful" onClick={this.notUseful}/>
                    <br/>
                    <a href="#" className="aac-text-danger">
                    <p className="aac-text-danger">NO : {this.state.notUseful}</p>
                    </a>
                </div>
                </div>

                <div className="aac-text-center">
                    <h3 className="aac-text-secondary">thecodingday.com</h3>
                </div>
            </div>
        )
    }
}
 
export default index;