import React, { Component } from 'react';
import {Route} from "react-router-dom";
import Navitem from '../components/Navitem';


class Nintendo extends Component {
    constructor(props)
    {
        super(props);
        this.state={
            'NavItemActive':''
        }
    }
    activeitem=(x)=>
    {
        if(this.state.NavItemActive.length>0){
            document.getElementById(this.state.NavItemActive).classList.remove('active');
        }
        this.setState({'NavItemActive':x},()=>{
            document.getElementById(this.state.NavItemActive).classList.add('active');
        });
    };


    render() {
        return (
            <div className="condiv">
                <h1 className="subtopic"> Nintendo</h1>
                <div>
                    <Navitem item="Консоли" tolink="/nintendo/consols"  activec={this.activeitem}></Navitem>
                    <Navitem item="Игры" tolink="/nintendo/games"  activec={this.activeitem}></Navitem>
                    <Navitem item="Аксессуары" tolink="/nintendo/accessories"  activec={this.activeitem}></Navitem>
                    <br></br>
                </div>
            </div>
        )
    }
}
export default Nintendo