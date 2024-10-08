export async function getArticles(offset, limit)
{
    let endpoint = route('articles.index', {
        offset, limit
    });

    return await axios.get(endpoint);
}
