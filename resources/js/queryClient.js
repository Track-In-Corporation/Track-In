export class QueryClient {
    static instance;
    static subscribers = {};

    static subscribe(queryKey, queryFn) {
        if (!this.subscribers[queryKey]) {
            this.subscribers[queryKey] = [queryFn];
        } else {
            this.subscribers[queryKey].push(queryFn);
        }
    }

    static publish(key) {
        this.subscribers[key]?.forEach((subscriber) => {
            subscriber();
        });
    }
}
