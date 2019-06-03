import * as Types from './../constants/ActionType';
var initialState = false;

const isDisplayHome = (state = initialState, action) => {
    switch(action.type){
        case Types.OPEN_HOME:
            console.log("OPEN");
            return true;
        case Types.CLOSE_HOME:
            return false;
        default :
            return state;
    }
}

export default isDisplayHome;