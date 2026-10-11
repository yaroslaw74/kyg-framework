const ping = async () => {
    const cache = await openCache("ping-cache");
    const res = await fetch("/ping");
    await cache.put("/ping", res.clone());

    notifyPeriodicSyncClients("ping", { updated: true });
};

registerPeriodicSyncTask("ping", ping);
