import { onMounted, onUnmounted, ref } from 'vue';

const useIntersectionObserver = (elements, options, callback) => {    
    const observer = new IntersectionObserver((observables) => {
        observables.forEach((observable) => {
            if (observable.isIntersecting) {
                // Pass the entry and target to the callback function
                callback.intersect(observable);
                console.log('Intersecting...');
            } else {
                console.log('====> Not intersecting');
                callback.unintersect(observable);
            }
        });
    }, options);
    
    const observeTargets = () => {
        elements.forEach((element) => {            
            observer.observe(element);
        });
    };
    
    const unobserveTargets = () => {
        elements.forEach((element) => {
            observer.unobserve(element);
        });
        console.log('STOP observation');
    };    

    onUnmounted(() => {        
        unobserveTargets();        
    });

    return { observeTargets, unobserveTargets };
};

export default useIntersectionObserver;