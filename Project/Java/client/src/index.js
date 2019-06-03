import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import Routerr from './Routerr';
import Home from './Home';
import * as serviceWorker from './serviceWorker';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/css/bootstrap.css'; 

ReactDOM.render(<Routerr />, document.getElementById('root'));

serviceWorker.unregister();
