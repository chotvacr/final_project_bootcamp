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
        console.log(city_id, category_id);

        fetch(`/api/activity?city_id=${city_id}&category_id=${category_id}`, {
            headers: {
                'Accept':       'application/json', 
                'Content-Type': 'application/json', 
            }
        })
            .then(response => {
                if (response.status == 200) {
                    response.json()
                        .then(data => {
                            console.log(data);
                            this.setState({
                                data: data
                            })
                        })
                } else {
                    if (response.status == 401) {
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
           <div className="flexdisplay">
                <div className="activities">
                    <div className="activities--list">
                        {
                            this.state.data.map(activity => (

                                <div className="activity" key={ activity.id }>
                                    <a href={`/cities/${activity.city_id}/${activity.category_id}/${activity.id}`}> <div className="activity__name"  >{ activity.name }</div></a> 
                                    <div className="activity__description">{ activity.description }</div>
                                    <div className="activity__datetime">{ activity.date_time }</div>
                                    <div className="activity__address">{ activity.address }</div>
                                </div>
                            ))
                        }
                    </div>
                </div>  
                    
                <div className="map">     
                <iframe className="map__show" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163931.25644248963!2d14.32553874982573!3d50.05958535668972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0x400af0f66164090!2sPraha!5e0!3m2!1scs!2scz!4v1594736640583!5m2!1scs!2scz" width="600" height="450" frameBorder="0"  allowFullScreen="" aria-hidden="false" tabIndex="0"></iframe>   
                </div> 

            </div>
            </>                                
        )
    }
}
    


