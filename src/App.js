import React from 'react';
import './App.css';
import { BrowserRouter as Router,
    Route,  Redirect } from 'react-router-dom';
import Home from './content/Home';
import Navbar from './components/Navbar';
import Sony from './content/Sony';
import Consols_sony from './content/Sony/Consols_sony';
import Games_sony from './content/Sony/Games_sony';
import Accessories_sony from './content/Sony/Accessories_sony';
import Microsoft from './content/Microsoft';
import Consols_microsoft from './content/Microsoft/Consols_microsoft';
import Games_microsoft from './content/Microsoft/Games_microsoft';
import Accessories_microsoft from './content/Microsoft/Accessories_microsoft';
import Nintendo from './content/Nintendo';
import Consols_nintendo from './content/Nintendo/Consols_nintendo';
import Games_nintendo from './content/Nintendo/Games_nintendo';
import Accessories_nintendo from './content/Nintendo/Accessories_nintendo';


class App extends React.Component {
    render() {
        return (

            <div className='app'>
                <Router>
                    <div className="App">
                        <Navbar />
                        <Route exact path="/">
                            <Home />
                        </Route>
                        <Route path="/sony">
                            <Sony />
                        </Route>
                        <Route path="/microsoft">
                            <Microsoft />
                        </Route>
                        <Route path="/nintendo">
                            <Nintendo />
                        </Route>
                        <Route path="/sony/consols">
                            <Consols_sony />
                        </Route>
                        <Route path="/sony/games">
                            <Games_sony />
                        </Route>
                        <Route path="/sony/accessories">
                            <Accessories_sony />
                        </Route>
                        <Route path="/microsoft/consols">
                            <Consols_microsoft />
                        </Route>
                        <Route path="/microsoft/games">
                            <Games_microsoft />
                        </Route>
                        <Route path="/microsoft/accessories">
                            <Accessories_microsoft />
                        </Route>
                        <Route path="/nintendo/consols">
                            <Consols_nintendo />
                        </Route>
                        <Route path="/nintendo/games">
                            <Games_nintendo />
                        </Route>
                        <Route path="/nintendo/accessories">
                            <Accessories_nintendo />
                        </Route>

                        <Redirect to='/' />
                    </div>
                </Router>
            </div>
        );
    }
}

export default App;