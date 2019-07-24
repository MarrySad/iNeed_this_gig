import React, { Component } from "react";
import Calendar from "./Calendar";

export default class Timetable extends Component {
  render() {
    return (
      <div>
        <div className="d-flex align-items-center">
          <div className="decorationBlock bg-button ml-auto" />
          <h2 className="mr-auto">Расписание</h2>
        </div>
        <Calendar />
        <div className="mx-auto flex-column ">
          <div className="d-flex justify-content-center align-items-center">
            <div className="exampleBlock bg-button" />
            <span className="exampleBlockDesc ml-3">Запланировано мероприятие</span>
          </div>
          <div className="d-flex justify-content-center align-items-center">
            <div className="exampleBlock bg-white" />
            <span className="exampleBlockDesc ml-3">Свободная дата</span>
          </div>
        </div>
      </div>
    );
  }
}
