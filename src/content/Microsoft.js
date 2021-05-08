import React, { Component } from 'react';
import {Route} from "react-router-dom";
import Navitem from '../components/Navitem';

class Microsoft extends Component {
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
                <h1 className="subtopic"> Microsoft</h1>
                <div>
                    <Navitem item="Консоли" tolink="/microsoft/consols"  activec={this.activeitem}></Navitem>
                    <Navitem item="Игры" tolink="/microsoft/games"  activec={this.activeitem}></Navitem>
                    <Navitem item="Аксессуары" tolink="/microsoft/accessories"  activec={this.activeitem}></Navitem>
                    <br></br>
                </div>
            </div>
        )
    }
}
export default Microsoft