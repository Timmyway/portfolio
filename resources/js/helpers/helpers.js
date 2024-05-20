import dayjs from "dayjs";

const calculateXp = (startDate) => {
    const currentDate = dayjs();
    const startDateObj = dayjs(startDate);
    const yearsDiff = currentDate.diff(startDateObj, 'year');
    const monthsDiff = currentDate.diff(startDateObj, 'month') - (yearsDiff * 12);

    return {
        years: yearsDiff,
        months: monthsDiff
    };
};

export { calculateXp }
