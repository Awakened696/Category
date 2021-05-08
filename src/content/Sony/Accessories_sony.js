import React, { Component } from 'react';
import data from "../../data.json";

class Accessories_sony extends Component {
    render() {

            return (
                <div className="condiv">
                    <h1 className="subtopic">Аксессуары</h1>

                        {data.model.map((item, i) => (

                                  <>  {item.name_brand === 'Sony' ?
                                    <div key={i} className="list-group" >
                                        <p className="list-group-item"> Название:  {item.name_accessorie}<p>Платформа: {item.name_platforms} </p>  </p>
                                    </div>: null} </>

                        ))}

                </div>
            )

    }
}

export default Accessories_sony