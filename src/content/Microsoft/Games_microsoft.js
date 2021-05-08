import React, { Component } from 'react';
import data from "../../data.json";

class Games_microsoft extends Component {
    render() {
        return (
            <div className="condiv">
                <h1 className="subtopic">Игры</h1>

                    {data.model.map((item, i) => (
                                <>  {item.name_brand === 'Microsoft' && item.name_games != 'S' ?
                                    <div key={i} className="list-group " >
                                        <p className="list-group-item"> Название игры:  {item.name_games}<p>Платформа: {item.name_platforms} </p> </p>
                                    </div>: null} </>
                    ))}

            </div>
        )
    }
}

export default Games_microsoft