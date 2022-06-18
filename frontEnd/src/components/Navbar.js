import React from "react";

function Navbar(props) {
    return (
        <nav className="nav">
            <a href="#" className="brand">E-ADE</a>
            <ul className="nav__menu">
            <li className="nav__item"><a href="#" className="nav__link"> Accueil</a> </li>
            <li className="nav__item"><a href="#" className="nav__link"> Programme</a> </li>
            <li className="nav__item"><a href="#" className="nav__link"> Evenement</a> </li>
            <li className="nav__item"><a href="#" className="nav__link"> Forum</a> </li>
            <li className="nav__item"><a href="#" className="nav__link"> A Propos</a> </li>
            <li className="nav__item"><a href="#" className="nav__link"> Forme</a> </li>

            </ul>
            <div className="nav__toggler">
                <div className="nav__line1"></div>
                <div className="nav__line1"></div>
                <div className="nav__line1"></div>
            </div>
        </nav>
    );
}
export default Navbar 