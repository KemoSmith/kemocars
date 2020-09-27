export default {
    data: () => ({
        makeRules: [
            value => !!value || "Required",
            value => value.length <= 25 || "Too Long"
        ],
        modelRules: [
            value => !!value || "Required",
            value => value.length <= 25 || "Too Long"
        ],
        yearRules: [
            value => !!value || "Required",
            value => value > 1990 || "Too Old",
            value => value < new Date().getFullYear() + 1 || "Year Not Met"
        ],
        chassisRules: [
            value => !!value || "Required",
            value => value.length <= 80 || "Too Long"
        ],
        engineDisplacementRules: [
            value => !!value || "Required",
            value => value <= 30000 || "Too Large"
        ],
        engineModelRules: [
            value => !!value || "Required",
            value => value.length <= 25 || "Too Long"
        ],
        fuelRules: [value => !!value || "Required"],
        distanceRules: [
            value => !!value || "Required",
            value => value <= 1000000000 || "Too Much"
        ],
        seatsRules: [
            value => !!value || "Required",
            value => value <= 500 || "Too Much"
        ],
        doorsRules: [
            value => !!value || "Required",
            value => value <= 500 || "Too Much"
        ],
        transmissionRules: [value => !!value || "Required"],
        drivingWheelsRules: [value => !!value || "Required"],
        colourRules: [
            value => !!value || "Required",
            value => value.length <= 25 || "Too Long"
        ],
        steeringRules: [value => !!value || "Required"],
        locationRules: [
            value => !!value || "Required",
            value => value.length <= 100 || "Too Long"
        ],
        weightRules: [value => value <= 100000 || "Too Heavy"],
        sizeRules: [value => value.length <= 25 || "Too Long"],
        conditionRules: [value => !!value || "Required"],
        descriptionRules: [value => value.length <= 500 || "Too Long"],
        priceRules: [
            value => !!value || "Required",
            value => value >= 20000 || "Too Cheap",
            value => value <= 1000000000 || "Too Expensive"
        ],
        contactInfoTypeRules: [value => !!value || "Required"],
        contactInfoInfoRules: [
            value => !!value || "Required",
            value => value.length <= 80 || "Too Long"
        ]
    })
};
