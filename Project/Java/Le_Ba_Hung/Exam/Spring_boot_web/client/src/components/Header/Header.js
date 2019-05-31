import React, { Component } from "react";
import {Link} from 'react-router-dom';
import LogoBar from "./LogoBar";

class Header extends Component {

   
    render() {     
        return (
            <>
                <div className="header">              
                <div className="logo-bar">
                    <div className="logo-bar-content">
                        <LogoBar/>
                    </div>
                </div>
                </div>
            </>
        );
    }
}

export default Header;
