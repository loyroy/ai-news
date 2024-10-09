export async function getArticles(offset, limit)
{
    let endpoint = route('articles.index', {
        offset, limit
    });

    return await axios.get(endpoint);
}

export async function getArticle(uuid)
{
    let endpoint = route('articles.show', {
        uuid
    });

    return await axios.get(endpoint);
}

