import React from 'react';
import ReactDOM from 'react-dom';
import Home from './components/Home'


function Root() {    
    return (
        <div className="container">            
            <Home />
        </div>
    );
}

export default Root;

if (document.getElementById('react')) {
    ReactDOM.render(<Root />, document.getElementById('react'));
}
