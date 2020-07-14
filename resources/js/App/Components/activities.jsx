import React from 'react';


export default class ActivityList extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            data: null,
            maxPrice: null,           
        }
    }

    componentDidMount = () => {

        const url = window.location.pathname.split('/');
        
        const city_id = url[2];
        const category_id = url[3];
        // const activity_id = url[3];
        console.log(city_id, category_id);

        fetch(`/api/activity?city_id=${city_id}&category_id=${category_id}`, {
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

        if(this.state.data === null){
            return (
                <p>Loading...</p>
            )
        }

        return (
           <>
            <div className="activity-list-detail">
                {
                    this.state.data.map(activity => (

                        <div className="activity" key={ activity.id }>
                            
                            <div className="activity__name">{ activity.name }</div>
                            <div className="activity__description">{ activity.description }</div>
                            <div className="activity__datetime">{ activity.date_time }</div>
                            <div className="activity__address">{ activity.address }</div>
                            <a className="activity__btn" href={`/cities/${activity.city_id}/${activity.category_id}/${activity.id}`}>Detail</a>
                            
                        </div>
                    ))
                }
            </div>  
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163931.25644248963!2d14.32553874982573!3d50.05958535668972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0x400af0f66164090!2sPraha!5e0!3m2!1scs!2scz!4v1594736640583!5m2!1scs!2scz" width="600" height="450" frameBorder="0"  allowFullScreen="" aria-hidden="false" tabIndex="0"></iframe>   
            </>                                
        )
    }
}
    


