export async function getArticles() {
    let response = await axios.get('/api/article');
    return [response.data]
}
