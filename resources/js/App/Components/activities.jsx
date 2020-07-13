import React from 'react';

export default class ActivityList extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            data: null,
            
        }

    }

    componentDidMount = () => {
        fetch('/api/activity', {
            headers: {
                'Accept':       'application/json', // we expect JSON as response
                'Content-Type': 'application/json', // if we are sending something in the body, it is JSON
            }
        })
            .then(response => {
                // if the response code is 200 (OK)
                if (response.status == 200) {
                    // parse it as JSON and do the typical stuff
                    response.json()
                        .then(data => {
                            console.log(data);
                            // set the data into this component's state
                            this.setState({
                                data: data
                            })
                        })
                } else {
                    // otherwise react on the error code
                    if (response.status == 401) {
                        // signal to the App that authentication failed
                        this.props.onFailedAuthentication()
                    }
                }
            })
        
    }

    render() {

        /*
       content = (
                <ul>
                    {
                        this.state.data.map(activity => (

                            <li className="activity" key={ activity.id }>
                                <div className="activity__data">
                                    <div className="activity__name">{ activity.name }</div>
                                    <div className="pactivity__description">{ activity.description }</div>
                                </div>
                            </li>
                        ))
                    }
                </ul>
            )
*/
        // return the HTML code for this component with the content inside

        if(this.state.data === null){
            return (
                <p>Loading...</p>
            )
        }


        


        return (
            <div className="activity-list">
                {
                     <ul>
                                {
                                    this.state.data.map(activity => (
            
                                        <li className="activity" key={ activity.id }>
                                            <div className="activity__data">
                                                <div className="activity__name">{ activity.name }</div>
                                                <div className="pactivity__description">{ activity.description }</div>
                                            </div>
                                        </li>
                                    ))
                                }
                            </ul>
                }
                    
               
            </div>
    )
    
}
}
    


