import axios from "axios";

export const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
    withCredentials: false,
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
});

export const axiosPost = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
});

export const axiosAuthenticator = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}`,
    withCredentials: true,
    headers: { "Content-Type": "application/json" },
});

axiosClient.interceptors.request.use((config) => {
    return config;
});

export async function getClients(id: any): Promise<any> {
    try {
        const response = await axiosClient.get("/clients/" + id);
        return response.data;
    } catch (error) {
        console.log(error);
        return error;
    }
}

export async function getClient(id: any): Promise<any> {
    try {
        const response = await axiosClient.get("/client/" + id);
        return response.data;
    } catch (error) {
        console.log(error);
        return error;
    }
}

export async function destroyClient(id: Number): Promise<any> {
    axiosClient
        .delete("/client/" + id)
        .then(async (response) => {
            // console.log(response.data);
            return response;
        })
        .catch((error) => {
            console.log(error);
            return error;
        });
}

export async function addClient(data: Object): Promise<any> {
    axiosPost
        .post("/client/add", data)
        .then((response) => {
            console.log(response.data);
        })
        .catch((error) => {
            console.log(error);
        });
}

export async function getAppointments(id: any) {
    try {
        const response = await axiosClient.get("/appointments/" + id);
        return response.data;
    } catch (error) {
        console.log(error);
        return error;
    }
}

export async function getContracts(id: any) {
    try {
        const response = await axiosClient.get("/contracts/" + id);
        return response.data;
    } catch (error) {
        console.log(error);
        return error;
    }
}

export async function getSalesmen() {
    try {
        const response = await axiosClient.get("/salesmen/");
        return response.data;
    } catch (error) {
        console.log(error);
        return error;
    }
}

export async function getSalesman(id: any) {
    try {
        const response = await axiosClient.get("/salesman/" + id);
        return response.data;
    } catch (error) {
        console.log(error);
        return error;
    }
}

export async function destroyAppointment(id: Number): Promise<any> {
    axiosClient
        .delete("/appointment/" + id)
        .then(async (response) => {
            // console.log(response.data);
            return response;
        })
        .catch((error) => {
            console.log(error);
            return error;
        });
}

export async function destroyContract(id: Number): Promise<any> {
    axiosClient
        .delete("/contract/" + id)
        .then(async (response) => {
            // console.log(response.data);
            return response;
        })
        .catch((error) => {
            console.log(error);
            return error;
        });
}
