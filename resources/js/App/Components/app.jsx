import React from 'react';
import ActivityList from './activities';
 
export default class App extends React.Component {
    render() {
        return (
            <div>
            <h1>App component</h1>
            <ActivityList/>
            </div>
        )
    }
}