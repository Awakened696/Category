import React, { Component } from 'react';
import {Route} from "react-router-dom";
import Navitem from '../components/Navitem';

class Sony extends Component {
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
                <h1 className="subtopic"> Sony</h1>
                <div>
                    <Navitem item="Консоли" tolink="/sony/consols"  activec={this.activeitem}></Navitem>
                    <Navitem item="Игры" tolink="/sony/games"  activec={this.activeitem}></Navitem>
                    <Navitem item="Аксессуары" tolink="/sony/accessories"  activec={this.activeitem}></Navitem>
                    <br></br>
                </div>
            </div>
        )
    }
}
export default Sony